@extends('frontend.include.app')

@section('content')

    <!-- Page Content -->
    <div class="page-content page-categories">
        <section class="store-trend-categories">
            <div class="container">
             <div class="row">
                 <div class="col-md-6 col-12 col-sm-12">
                    <img src="{{ asset('frontend/images/faq.jpg')}}" style="object-fit: cover" alt="" class="rounded " width="100%" height="800px">
                 </div>
                 <div class="col-md-6 col-12 col-sm-12 mt-5">
                     <div class="container">
                        <p style="font-size: 22px;font-weight:600"> Frequently Asked Questions ? </p>
                     </div>
                     <hr>
                     <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h3 class="mb-0">
                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #fb5f87">
                                Bagaimana Cara order ? 
                              </button>
                            </h3>
                          </div>
                      
                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                              Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                          </div>
                        </div>

                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h3 class="mb-0">
                              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #fb5f87">
                                Saya sudah membayar bagaimana selanjutnya ? 
                              </button>
                            </h3>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                              Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h3 class="mb-0">
                              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #fb5f87" >
                                ???
                              </button>
                            </h3>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                              And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                            </div>
                          </div>
                        </div>
                      </div>
                    <hr>
                 </div>
             </div>
            </div>
        </section>
      
    </div>


@endsection

@section('fixed','fixed-bottom')