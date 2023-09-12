<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\User;
use App\Models\UserCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFAController extends Controller
{
    /**
     * Afficher le formulaire de configuration de la 2FA.
     *
     * @return \Illuminate\View\View
     */
    public function setup()
    {
        return view("auth.2fa-setup");
    }
    /**
     * Activer la 2FA pour l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enable2FA(Request $request)
    {


        // Générer un code de vérification aléatoire à 4 chiffres
        $code = rand(1000, 9999);
        // Mettre à jour ou créer un enregistrement UserCode
        UserCode::updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['code' => $code]
        );

        try {
            // Envoyer le code de vérification par e-mail
            $details = [
                'email' => 'Voici votre code de verification',
                'password' => $code
            ];
            
            $email = Auth()->user()->email;
             

            Mail::to($email)->send(new DemoMail($details));

            return redirect()->route('2fa.verify')->withSuccess('La configuration de la 2FA est terminée. Veuillez vérifier votre e-mail pour le code de vérification.');
        } catch (Exception $e) {
            info("Erreur : " . $e->getMessage());
            return back()->withError('Échec de l\'envoi du code de vérification.');
        }
    }

    /**
     * Show the 2FA verification form.
     *
     * @return \Illuminate\View\View
     */
    public function verify()
    {
        return view('auth.2fa-verify');
    }

    /**
     * Check the 2FA verification code.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check2FA(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:4',
        ]);

        // Check if the verification code matches
        $find = UserCode::where('user_id', auth()->user()->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(2))
            ->first();

        if (!is_null($find)) {
            // Mark the user as having 2FA enabled
            $user = User::find(auth()->user()->id);
            $user->emailverification = true;
            $user->save();
            return redirect()->route("dashboard")->withSuccess('2FA has been enabled.');
        }

        return back()->withErrors('Invalid verification code.');
    }
}
