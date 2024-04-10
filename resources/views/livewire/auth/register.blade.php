<x-card title="Register" shadow class="mx-auto w-[450px]">
    <x-form wire:submit="submit">
        <x-input label="Nome" wire:model="name"/>
        <x-input label="Email" wire:model="email"/>
        <x-input label="Confirme seu email" wire:model="email_confirmation"/>
        <x-input label="Senha" wire:model="password" type="password"/>
        <x-slot:actions>
            <x-button label="Reset" type="reset"/>
            <x-button label="Register" class="btn-primary" type="submit" spinner="submit"/>
        </x-slot:actions>
    </x-form>
</x-card>