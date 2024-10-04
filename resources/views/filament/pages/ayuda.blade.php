<x-filament-panels::page>
    <x-filament::section icon="heroicon-o-user" collapsible collapsed persist-collapsed id="user-details">
        <x-slot name="heading">
            User details
        </x-slot>

        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea, eum voluptatum sapiente praesentium, ex magni,
            hic ratione ut repellendus error sunt asperiores. Provident, tenetur ratione sed magnam vel et officia?</p>

        <x-slot name="headerEnd">
            {{-- Input to select the user's ID --}}
            something
        </x-slot>

        {{-- Content --}}
    </x-filament::section>
</x-filament-panels::page>
