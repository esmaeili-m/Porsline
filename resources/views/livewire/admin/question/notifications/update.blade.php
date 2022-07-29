@section('title',' اطلاعیه های امروز')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong> ویرایش اطلاعیه : {{$this->notifications->title}}</strong></h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">

                            </div>
                        </div>
                        <form wire:submit.prevent="notifications" >
                            <div class="form-line">
                                <input required type="text" wire:model.lazy="notifications.title" class="form-control" placeholder="موضوع اطلاعیه">
                            </div>
                            @error('notifications.title') <span class="bg-red">{{ $message }}</span> @enderror
                            <div wire:ignore>
                              <textarea required wire:model.lazy="notifications.content"
                                        class="min-h-fit h-48 "
                                        name="editor"
                                        id="editor"></textarea>
                                @error('notifications.content') <span class="bg-red">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn-hover btn-border-radius color-3 ">ویرایش اطلاعیه</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>





<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    const editor = CKEDITOR.replace('editor',{
        language:'fa'
    });
    editor.on('change', function (event) {
    @this.set('notifications.content', event.editor.getData());
    })
</script>