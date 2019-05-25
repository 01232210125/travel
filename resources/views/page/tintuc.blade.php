@extends('layout.index1')
@section('content')

<div class="container breadcrub">
    <div>
        <a class="homebtn left" href="#"></a>
        <div class="left">
            <ul class="bcrumbs">
                <li>/</li>
                <li><a href="#" class="active">Tin tức</a></li>					
            </ul>				
        </div>
        <a class="backbtn right" href="#"></a>
    </div>
    <div class="clearfix"></div>
    <div class="brlines"></div>
</div>	

<!-- CONTENT -->
<div class="container">

    
    <div class="container mt25 offset-0">
        
        
        <!-- CONTENT -->
        <div class="col-md-12 pagecontainer2 offset-0">
            <div class="hpadding50c">
                <p class="lato size30 slim">Tin tức mới nhất</p>
                <p class="aboutarrow"></p>
            </div>
            <div class="line3"></div>
            <div class="hpadding50c">

                <!-- LEFT IMG -->
                <div class="col-md-8 cpdd01 grey2" id="co">
                
                    @foreach($tintuc as $tt)
                    <div class="abover">
                        <div class="abbg">
                            <a href="upload/tintuc/{{$tt->Hinh}}" class="blogpost-hover" data-footer="A custom footer text" data-title="A random title" data-gallery="multiimages" data-toggle="lightbox"><span class="glyphicon glyphicon-zoom-in"></span></a>
                        </div>
                        <img src="upload/tintuc/{{$tt->Hinh}}" class="fwimg" alt=""/>
                    </div><br/>
                    
                <a href="chi-tiet-tin-tuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><span class="lato size22 dark bold">{{$tt->TieuDe}}</span></a><br/>
                <?php
                $thoigian=$tt->created_at; 
                $dateM=date("d-m-Y",strtotime($thoigian)); ?>    
                <span class="grey">{{$dateM}}<a href="#"></a> <a href="#"></a>/Đăng bởi <a href="#">{{$tt->NguoiDang}}</a></span><br/>
                    <div class="line4 
                    des" data-maxlength="250">
                <p> {!!$tt->TomTat!!}</p> 
                </div>

                    <br/><br/>
                    <a href="chi-tiet-tin-tuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                        <br/>
                        <button onclick="errorMessage()" type="submit" class="btn-search5">Xem thêm<span class="glyphicon glyphicon-arrow-right"></span></button>
                    </a>
                    <br/><br/>
                    @endforeach 
                    
                    <script>
                    //------------------------------
                    //CaroufredSell
                    //------------------------------
                    jQuery(document).ready(function(jQuery){

                        jQuery("#foo5").carouFredSel({
                            width: "100%",
                            height: 407,
                            items: {
                                visible: 5,
                                minimum: 1,
                                start: 2
                            },
                            scroll: {
                                items: 1,
                                easing: "easeInOutQuad",
                                duration: 500,
                                pauseOnHover: true
                            },
                            auto: false,
                            prev: {
                                button: "#prev_btn",
                                key: "left"
                            },
                            next: {
                                button: "#next_btn",
                                key: "right"
                            },				
                            swipe: true
                        });
                    });
                    </script>
                    <!-- Carousel -->
                    <div class="line4"></div>
                    <ul>
                        {!!$tintuc->links()!!}
                    </ul>
                    {{-- <script>
                        $(document).on('click','.pagination a', function(e){
                            e.preventDefault();
                            var page = $(this).attr('href').split('page=')[1];
                            getPosts(page);
                        });
                  
                        function getPosts(page)
                        {
                            $.ajax({
                                type: "GET",
                                url: '/ajax/loaitin/?page='+ page
                            }).done(function(data){
                                $('#id'.html(data));
                            });
                        }
                   </script> --}}
                </div>
                <!-- END OF LEFT IMG -->
                
                <!-- IMG RIGHT TEXT -->


                <div class="col-md-4 cpdd02">
                    <div class="opensans grey">
                        <form action="timkiem" method="POST"> 
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input value="" type="text" placeholder="Tìm kiếm.." class="form-control logpadding" name="tukhoa"><br/>
                        </form>
                        <span class="lato size18 dark bold">Địa điểm được yêu thích</span><br/>
                        <ul class="blogcat">
                            @foreach($loaitin as $lt)
                        <li><a href="#">{{$lt->Ten}}</a> <span class="badge indent0">4</span></li>
                          @endforeach
                        </ul>
                        <br/>
                        
                        
                        <!-- Nav tabs -->
                        <ul class="nav navigation-tabs3">
                          <li class="active"><a href="#tab-newtopic" data-toggle="tab"><span class="glyphicon glyphicon-star"></span>Tin mới nhất</a></li>
                          <li><a href="#tab-comments" data-toggle="tab"><span class="glyphicon glyphicon-stats"></span>Tin cũ</a></li>

                        </ul>
                        
                        <div class="tab-content4">
                            <!-- Tab 1 -->
                            <div class="tab-pane active" id="tab-newtopic">
                                @foreach($khachsan as $ks)
                            <a href="khach-san/{{$ks->id}}/{{$ks->TenKhongDau}}.html"><img alt="{{$ks->Ten}}" class="left mr20" src="upload/khachsan/{{$ks->Hinh}}" style="
                                height: 70px;
                                width: 100px;
                            "></a>
                            <a class="dark" href="khach-san/{{$ks->id}}/{{$ks->TenKhongDau}}.html"><b> {{$ks->Ten}}</b></a><br>
                             <?php 
                                
                                $num = $ks->Gia;  
                                $formattedNum = number_format($num);?>
                                <span class="opensans green bold size14">{{$formattedNum}} <sup>đ</sup></span> <span class="grey">/đêm</span><br>
                                <img alt="" src="images/filter-rating-5.png">
                          
                                <div class="line4"></div>
                                @endforeach
                                {{-- <a href="#"><img alt="" class="left mr20" src="images/smallthumb-2.jpg"></a>
                                <a class="dark" href="#"><b>Hotel Amaragua</b></a><br>
                                <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                                <img alt="" src="images/filter-rating-5.png">
                                <div class="line4"></div>
                                <a href="#"><img alt="" class="left mr20" src="images/smallthumb-3.jpg"></a>
                                <a class="dark" href="#"><b>Hotel Lotus</b></a><br>
                                <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                                <img alt="" src="images/filter-rating-5.png"> --}}
                            </div>
                            <!-- End of Tab 1 -->
                            
                            <!-- Tab 2 -->
                            <div class="tab-pane" id="tab-comments">
                                <a href="#"><img alt="" class="left mr20" src="images/smallthumb-2.jpg"></a>
                                <a class="dark" href="#"><b>Hotel Lotus</b></a><br>
                                <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                                <img alt="" src="images/filter-rating-5.png">
                                <div class="line4"></div>
                                <a href="#"><img alt="" class="left mr20" src="images/smallthumb-3.jpg"></a>
                                <a class="dark" href="#"><b>Hotel Dany</b></a><br>
                                <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                                <img alt="" src="images/filter-rating-5.png">
                                <div class="line4"></div>
                                <a href="#"><img alt="" class="left mr20" src="images/smallthumb-1.jpg"></a>
                                <a class="dark" href="#"><b>Hotel Amaragua</b></a><br>
                                <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                                <img alt="" src="images/filter-rating-5.png">
                            </div>
                            <!-- End of Tab 2 -->
                            
                            <!-- Tab 3 -->
                            <div class="tab-pane" id="tab-blogcomments">

                            </div>
                            <!-- End of Tab 3 -->
                        </div>

                        
{{--                         
                        <span class="lato size18 dark bold">Archives</span><br/>
                        <ul class="blogcat">
                            <li><a href="#">December 2013</a></li>
                            <li><a href="#">November 2013</a></li>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                            <li><a href="#">June 2013</a></li>
                            <li><a href="#">May 2013</a></li>
                            <li><a href="#">April 2013</a></li>
                        </ul> --}}
                        <br/><br/>
                    </div>
                </div>
                <!-- END OF IMG RIGHT TEXT -->
                <div class="clearfix"></div>
                <br/><br/>
            </div>
        <div class="clearfix"></div><br/><br/>
        </div>
        <!-- END CONTENT -->			
    </div>
</div>
<script>
    $(".des p").text(function(index, currentText) {
      var maxLength = $(this).parent().attr('data-maxlength');
      if (currentText.length >= maxLength) {
        return currentText.substr(0, maxLength) + "...xem tiếp";
      } else {
        return currentText
      }
    });
  </script>
@endsection