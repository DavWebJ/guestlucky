<div>
        <div class="mb-2 text-sm text-gray-600">
            {{ __('Update a new password') }}
        </div>
    <form class="js-validation-signin" action="" wire:submit.prevent="updatePassword">
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="current_password" class="form-control" wire:model.defer="state.current_password" autocomplete="current-password" placeholder="*******">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="new-pwd" class="form-control" required wire:model.defer="state.password" autocomplete="new-pwd" placeholder="new password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" id="password_confirmation" class="form-control" required wire:model.defer="state.password_confirmation" autocomplete="new-password" placeholder="confirm new password">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-asterisk"></i>
                        </span>
                    </div>
                </div>
            </div>

        <div class="form-group text-center">
            <x-jet-button class="btn btn-hero-primary">
                    <i class="fa fa-fw fa-floppy-disk mr-1"></i> Save
            </x-jet-button>
        </div>
        </form>
</div>
