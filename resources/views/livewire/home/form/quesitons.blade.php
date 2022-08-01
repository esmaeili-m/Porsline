<div>
    <?php
    $current=1;
    ?>
    <div class="col-md-12">
          <div class="col-8">
              <section class="content">
                  <div class="container-fluid">
                      <form wire:submit.prevent="createform">
                          <div class="row clearfix">
                              <div class="col-md-9">
                                  <div class="form-group">
                                      <div class="form-line">
                                        {!! $form[$counter]['content'] !!}
                                          @if($counter < count($form))
                                              <a wire:click="increment">
                                                  <button type="reset"  class="btn-hover color-1">بعدی</button>
                                              </a>
                                          @endif
                                          @if($counter >= 2)
                                              <button type="reset"  wire:click="decrement" class="btn-hover color-2">قبلی</button>
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


