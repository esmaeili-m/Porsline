<div>
    <?php
    $current=1;
    ?>
    <div class="col-md-12">
          <div class="col-12">
              <section class="content">
                  <div class="container-fluid">
                      <form wire:submit.prevent="createform">
                          <div class="row clearfix">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <div class="form-line">
                                        @if(!is_array($form[$counter]['content']))
                                              {!! $form[$counter]['content'] !!}
                                          @else
                                               {{$form[$counter]['title']}}
                                              @foreach($form[$counter]['content'] as $i)
                                                  {!! $i['option'] !!}
                                              @endforeach
                                          @endif
                                          @if($counter < count($form))
                                              <a wire:click="increment">
                                                  <button   class="btn-hover color-1">بعدی</button>
                                                  @error('formdefult.route1') <span class="error">{{ $message }}</span> @enderror
                                              </a>
                                          @endif
                                            @if($counter == count($form))
                                                <button   wire:click="save" class="btn-hover color-3">پایان</button>
                                            @endif
                                          @if($counter >= 2)
                                              <button   wire:click="decrement" class="btn-hover color-2">قبلی</button>
                                          @endif

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>

                  </div>
              </section>

          </div>
       </div>
    </div>


