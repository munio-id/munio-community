<x-filament-panels::page style="margin-bottom: 500px">
    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}

        <x-filament-panels::form.actions :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()" />
    </x-filament-panels::form>
</x-filament-panels::page>
<script>
    document.addEventListener('livewire:init', function() {
        Livewire.on('organizationUpdated', function(param) {
            window.location.href = `/admin/${param.code}/settings/organization`;
        });
    });
</script>