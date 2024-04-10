<div class="w-96">
    <x-card title="Login" shadow >
        <x-form wire:submit="save">
            <x-input label="E-mail" wire:model="email" />
            <x-input label="Senha" wire:model="password"  type="password"/>
         
            <x-slot:actions>
                <x-button label="Login" class="btn-primary" type="submit" spinner="save" wire:click="login"/>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
