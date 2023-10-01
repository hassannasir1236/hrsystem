@extends('layouts.master')
@section('title', 'Property Page')
@section('head')
   @parent
   <style type="text/css">
     #product1 {
  background-color: #fff;
  padding: 3px 5px 3px 7px;
  margin-top: 6px;
}
#targetButton{
  width: 150px;
  height: 30px;
}

.change-to-me{
 background-color: #e1bd85;
}
.icon_setting{
  display: flex;
    align-items: center;
}
  input[type="checkbox"] {
       color: #e1bd85;
    }
    .fontawesomeicon {
      margin-left: 7px;
    margin-right: 10px;
    }
    .circle{
      position: relative;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
    }
    .circle-absol{
      position: absolute;
    top: 5px;
    left: 37%;
    width: 55px;
    height: 55px;
    content: "";
    background-color: #e1bd85;
    border-radius: 50%;
    opacity: .8;
    }
    .sectionbox{
      padding: 10%;
    margin-top: 40px;
    margin-bottom: 40px;
    }
    .sectionbox:hover{
    border-bottom: 5px solid #e1bd85;
    box-shadow: 0 1rem 4rem rgba(0,0,0,.175)!important;
    transition: all 0.5s;
    }
    .text{
      text-align: center;
          font-family: 'Poppins', sans-serif;
    font-size: 14px;
     line-height: 1.42857143; 
    color: #6f6f6f;
    }
   </style>
@endsection
 @section('content')
   @parent

  <section class="section-sub-banner bg-9 ">
    <div class="awe-overlay"></div>
      <div class="sub-banner">
          <div class="container">
              <div class="text text-center">
                  <h2>Help Page</h2>
                  <p>Provide a guideline how to use a website?</p>
              </div>
          </div>  
      </div>
  </section>
 
 <!-- section process -->

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-4">
        <div class="sectionbox">
          <div class="circle">
            <i class="fa fa-laptop fa-3x" style="z-index: 1;"></i>
            <span class="circle-absol"></span>
        </div>
        <h5 style="margin-top: 26px; text-align: center;">HOSTEL SERVICE PROVIDERS</h5>
        <p class="text" style="padding: 5px;">We Allow You To Find The Hostel In Desired 
        Area And Send Booking Applications Online.</p>
        </div>
      </div>
      <div class="col-md-4 col-4">
        <div class="sectionbox">
          <div class="circle">
            <i class="fa fa-lightbulb-o fa-4x" style="z-index: 1;margin-left: 14px;"></i>
            <span class="circle-absol"></span>
        </div>
        <h5 style="margin-top: 26px;text-align: center;">BEST HOSTELS</h5>
        <p class="text">We Provide You the Best Hostels For You. You can Check Hostel Ratings And People's Response.</p>
        </div>
      </div>
      <div class="col-md-4 col-4">
        <div class="sectionbox">
          <div class="circle">
            <i class="fa fa-bookmark fa-3x" style="z-index: 1;margin-top: 5px;
    margin-left: 13px; "></i>
            <span class="circle-absol"></span>
        </div>
        <h5 style="margin-top: 26px; text-align: center;">USER FEEDBACK</h5>
        <p class="text">We Consider The Suggestions From Users And Add Or Update The Feature As Quick As Possible.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section__process">

 <div class="container">

   <div class="row">

     <div class="col-sm-12">

      <div class="section_title__body">

       <div class="section__subtitle dark__subtitle">

        Easy steps to get <span>Premium Account</span>

      </div>

      <h2 class="section__title dark__title">

        For Hostel Owners

      </h2>

      <p class="section_title__desc">

        We Provide services in pakistan for Hostels Owners They can get our Premium Account where you can manage your multiple Hostels. Our Main focus on Mind Relaxsation. Some Features are as below you can add check anything about your hostel

        <br>

        Hostel, Block, Room, Cupboards, Students Reports. Recovery Sheet, Monthly Fees Schedule.

      </p> <!-- / .about__desc -->  

    </div> <!-- / .section_title__body  -->

  </div>

</div> <!-- / .row -->

<div class="row">

 <div class="col-sm-7">         

   <div class="process__item process__item-1">

    <div class="row">

      <div class="col-sm-3">

        <div class="process_item__icon">

         <i class="fa fa-sign-in fa-4x" aria-hidden="true"></i>

       </div>

     </div>

     <div class="col-sm-9">

       <div class="process_item__title" data-aos="zoom-in-up">

         Register in Cityhostels.pk<span>.</span>

       </div>

       <div class="process_item__desc">

         Click on <span>Add Property</span> Page where you can Register your Hostel with Complete Details Your Add will be We Add Free.

       </div>

     </div>

   </div> <!-- / .row -->

 </div> <!-- / .process__item -->

</div>

<div class="col-sm-5 hidden-xs">

  <div class="process_item__arrow-1">

   <i class="fa fa-arrow-down fa-4x" aria-hidden="true"></i>

 </div>

</div>

</div> <!-- / .row -->

<div class="row">

  <div class="col-sm-6 hidden-xs">

    <div class="process_item__arrow-2">

     <i class="fa fa-arrow-down fa-4x " aria-hidden="true"></i>

   </div>

 </div>

 <div class="col-sm-6">         

   <div class="process__item process__item-2">

    <div class="row">

      <div class="col-sm-3">

        <div class="process_item__icon">

         <i class="fa fa-picture-o fa-4x" aria-hidden="true"></i>

       </div>

     </div>

     <div class="col-sm-9">

       <div class="process_item__title" data-aos="zoom-in-up">

         We will Contact with you

       </div>

       <div class="process_item__desc">

         Rerum perspiciatis iste quidem, expedita dolorem commodi provident vitae dolorem.

       </div>

     </div>

   </div> <!-- / .row -->

 </div> <!-- / .process__item -->

</div>

</div> <!-- / .row -->

<div class="row">

 <div class="col-sm-7">         

   <div class="process__item process__item-3">

    <div class="row">

      <div class="col-sm-3">

        <div class="process_item__icon">

         <i class="fa fa-smile-o fa-4x" aria-hidden="true"></i>

       </div>

     </div>

     <div class="col-sm-9">

       <div class="process_item__title" data-aos="zoom-in-up">

         Enjoy the Managing System

       </div>

       <div class="process_item__desc">

         Rerum perspiciatis iste quidem, expedita dolorem commodi provident vitae doloremque enim odit nisi recusan.

       </div>

     </div>

   </div> <!-- / .row -->

 </div> <!-- / .process__item -->

</div>

</div> <!-- / .row -->

</div> <!-- / .container -->

</section>

  @endsection
  @section('footer')
      @parent
      @endsection
      @section('script')
      @parent
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script type="text/javascript">
     var setColor = function(){
        if($("#select_product").is(":checked")) $("#product1").css("background-color", "#ffe600");
        else $("#product1").css("background-color", "#fff");
    }
    $(document).ready(function(){
        setColor();
        $("#select_product").click(setColor);
    }); </script> -->
    <script type="text/javascript">
      $(".checkbox").change(function(){
  $("#"+$(this).data("target")).toggleClass("change-to-me");
});
   var a  = document.querySelector('.checkbox').value;
   console.warn(a);
    </script>
      @endsection