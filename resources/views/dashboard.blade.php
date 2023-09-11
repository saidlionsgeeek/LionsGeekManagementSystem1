<x-app-layout>
    <div class=' bg-cyan-400 h-52'>
        <h1> Hello {{auth()->user()->name }} {{auth()->user()->lastname }}  </h1>
    </div>
</x-app-layout>
