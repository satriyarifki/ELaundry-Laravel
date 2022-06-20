@if ($edit)
    <div class="modal fade show " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="padding-right: 12px; display: block;">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Gambar</h5>
                    <button wire:click="format" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        @if ($image)
                            Photo Preview:
                            <img src="">
                        @endif
                        <div>
                            <input type="file" wire:model="image">
                        </div>
                    
                        @error('image') <span class="error">{{ $message }}</span> @enderror
                        <div class="mt-2">
                            <button type="submit">Simpan Gambar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
