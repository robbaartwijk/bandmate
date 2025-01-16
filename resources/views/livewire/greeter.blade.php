<div style="border: solid 1px;">

    <div>
        <h1>Hello {{ $greetername }}</h1>
    </div>

    <form wire:submit="changeName(document.querySelector('#greetername').value)">

        <div class="mt-2">
            <input id="greetername" type="text" class="block w-full p-4 border rounded-md bg-gray-700 text-white">
        </div>

        <div class="mt-2">
            <button type="submit" class="text-white font-medium rounded-md px-4 py-2 bg-blue-600">
                Greet
            </button>
        </div>

    </form>
</div>
