@extends('layouts.master')
@section('title', 'Index Page')
@section('head')
   @parent
@endsection
 
        <!-- header -->
        @section('header')
        @parent
        <style type="text/css">
            .check-availability .availability-form .bootstrap-select.btn-group.awe-select {
                    margin-right: 20px;
                    width: 168px;
                }
                .slidecontainer {
    width: 100%;
}
.light__title {
    color: #fff;
}
input[type="range"] {
    display: block;
    width: 100%;
        background-color: blanchedalmond;
}
.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    background: #fff;
    outline: none;
    border-radius: 5px;
    -webkit-transition: .2s;
    transition: opacity .2s;
}
input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
        </style>
        @endsection
        <!-- loader -->
        @section('loader')
        @parent
        @endsection
        <!-- Content -->
        @section('content')
        @parent
        <!-- BANNER SLIDER -->
          <!-- END / HEADER -->
            <!-- BANNER SLIDER -->
            <section class="section-slider slider-style-2 clearfix" id="slider">
                <h1 class="element-invisible">Slider</h1>
                <div id="slider-revolution">
                    <ul>
                        <li data-transition="fade">
                            <img src="images/home-3/slide-bg-1.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                            <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                                <img src="images/icon-slider-1.png" alt="">
                            </div>

                            <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                EACH HOTEL IS
                            </div>

                            <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack" data-start="2000">
                                UNIQUE 60%
                            </div>

                            <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2200">JUST LIKE YOU
                            </div>

                            <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="images/icon-slider-2.png" alt=""></div>

                        </li>

                        <li data-transition="fade">
                            <img src="images/slider/img-4.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                            <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                <img src="images/slider/hom1-slide1.png" alt="icons">
                            </div>

                            <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                                WELCOME TO
                            </div>

                            <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack" data-start="2000">THE LOTUS HOTEL
                            </div>

                            <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">VIEW NOW</a>
                        </li>

                    </ul>
                </div>

            </section>
            <!-- END / BANNER SLIDER -->
            <!-- CHECK AVAILABILITY -->
            <section class="section-check-availability availability-style-2 clearfix">
                <div class="container">
                    <div class="check-availability">
                        <div class="ot-heading">
                            <h2 class="mb40">@lang('lang.homesection1')</h2>
                           @if($errors->any())
     <div class="alert alert-danger">
          <ul class="list-unstyled">
                 @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                 @endforeach
          </ul>
      </div>
 @endif
                        </div>
                        <form id="" class="mt40 mb50" action="{{route('search')}}" method="post">
                           @csrf
                           <div id="mapholder" style="margin-bottom: 30px;"></div>
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;"   >
                                <button type="button" onclick="getLocation();" style="width: 220px;
                                     margin-top: -36px; margin-right: 22px; color:black;" class="awe-btn awe-btn-6 text-dark col-12 d-flex align-items-center justify-content-center " value="Get Location"/>Click Here for location   
                                     <i class="fa fa-crosshairs fa-2x " aria-hidden="true"></i>
                                 </button>

                                <input type="hidden" name="h_latitude" id="latitude" value="">
                                <input type="hidden" name="h_longitude" id="longitude" value="">
                        
                            <div class="availability-form mb40" style="display: flex;
                                justify-content: center;align-items: center;">     
                                <select class="awe-select" name="city">
                                     <option value="" disabled selected>Select The City</option>
                                        <option value="Islamabad">Islamabad</option>
                                        <option value="" disabled>Punjab Cities</option>
                                        <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                        <option value="Ahmadpur East">Ahmadpur East</option>
                                        <option value="Ali Khan Abad">Ali Khan Abad</option>
                                        <option value="Alipur">Alipur</option>
                                        <option value="Arifwala">Arifwala</option>
                                        <option value="Attock">Attock</option>
                                        <option value="Bhera">Bhera</option>
                                        <option value="Bhalwal">Bhalwal</option>
                                        <option value="Bahawalnagar">Bahawalnagar</option>
                                        <option value="Bahawalpur">Bahawalpur</option>
                                        <option value="Bhakkar">Bhakkar</option>
                                        <option value="Burewala">Burewala</option>
                                        <option value="Chillianwala">Chillianwala</option>
                                        <option value="Chakwal">Chakwal</option>
                                        <option value="Chichawatni">Chichawatni</option>
                                        <option value="Chiniot">Chiniot</option>
                                        <option value="Chishtian">Chishtian</option>
                                        <option value="Daska">Daska</option>
                                        <option value="Darya Khan">Darya Khan</option>
                                        <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                        <option value="Dhaular">Dhaular</option>
                                        <option value="Dina">Dina</option>
                                        <option value="Dinga">Dinga</option>
                                        <option value="Dipalpur">Dipalpur</option>
                                        <option value="Faisalabad">Faisalabad</option>
                                        <option value="Ferozewala">Ferozewala</option>
                                        <option value="Fateh Jhang">Fateh Jang</option>
                                        <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                        <option value="Gojra">Gojra</option>
                                        <option value="Gujranwala">Gujranwala</option>
                                        <option value="Gujrat">Gujrat</option>
                                        <option value="Gujar Khan">Gujar Khan</option>
                                        <option value="Hafizabad">Hafizabad</option>
                                        <option value="Haroonabad">Haroonabad</option>
                                        <option value="Hasilpur">Hasilpur</option>
                                        <option value="Haveli Lakha">Haveli Lakha</option>
                                        <option value="Jatoi">Jatoi</option>
                                        <option value="Jalalpur">Jalalpur</option>
                                        <option value="Jattan">Jattan</option>
                                        <option value="Jampur">Jampur</option>
                                        <option value="Jaranwala">Jaranwala</option>
                                        <option value="Jhang">Jhang</option>
                                        <option value="Jhelum">Jhelum</option>
                                        <option value="Kalabagh">Kalabagh</option>
                                        <option value="Karor Lal Esan">Karor Lal Esan</option>
                                        <option value="Kasur">Kasur</option>
                                        <option value="Kamalia">Kamalia</option>
                                        <option value="Kamoke">Kamoke</option>
                                        <option value="Khanewal">Khanewal</option>
                                        <option value="Khanpur">Khanpur</option>
                                        <option value="Kharian">Kharian</option>
                                        <option value="Khushab">Khushab</option>
                                        <option value="Kot Addu">Kot Addu</option>
                                        <option value="Jauharabad">Jauharabad</option>
                                        <option value="Lahore">Lahore</option>
                                        <option value="Lalamusa">Lalamusa</option>
                                        <option value="Layyah">Layyah</option>
                                        <option value="Liaquat Pur">Liaquat Pur</option>
                                        <option value="Lodhran">Lodhran</option>
                                        <option value="Malakwal">Malakwal</option>
                                        <option value="Mamoori">Mamoori</option>
                                        <option value="Mailsi">Mailsi</option>
                                        <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                        <option value="Mian Channu">Mian Channu</option>
                                        <option value="Mianwali">Mianwali</option>
                                        <option value="Multan">Multan</option>
                                        <option value="Murree">Murree</option>
                                        <option value="Muridke">Muridke</option>
                                        <option value="Mianwali Bangla">Mianwali Bangla</option>
                                        <option value="Muzaffargarh">Muzaffargarh</option>
                                        <option value="Narowal">Narowal</option>
                                        <option value="Nankana Sahib">Nankana Sahib</option>
                                        <option value="Okara">Okara</option>
                                        <option value="Renala Khurd">Renala Khurd</option>
                                        <option value="Pakpattan">Pakpattan</option>
                                        <option value="Pattoki">Pattoki</option>
                                        <option value="Pir Mahal">Pir Mahal</option>
                                        <option value="Qaimpur">Qaimpur</option>
                                        <option value="Qila Didar Singh">Qila Didar Singh</option>
                                        <option value="Rabwah">Rabwah</option>
                                        <option value="Raiwind">Raiwind</option>
                                        <option value="Rajanpur">Rajanpur</option>
                                        <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                        <option value="Rawalpindi">Rawalpindi</option>
                                        <option value="Sadiqabad">Sadiqabad</option>
                                        <option value="Safdarabad">Safdarabad</option>
                                        <option value="Sahiwal">Sahiwal</option>
                                        <option value="Sangla Hill">Sangla Hill</option>
                                        <option value="Sarai Alamgir">Sarai Alamgir</option>
                                        <option value="Sargodha">Sargodha</option>
                                        <option value="Shakargarh">Shakargarh</option>
                                        <option value="Sheikhupura">Sheikhupura</option>
                                        <option value="Sialkot">Sialkot</option>
                                        <option value="Sohawa">Sohawa</option>
                                        <option value="Soianwala">Soianwala</option>
                                        <option value="Siranwali">Siranwali</option>
                                        <option value="Talagang">Talagang</option>
                                        <option value="Taxila">Taxila</option>
                                        <option value="Toba Tek Singh">Toba Tek Singh</option>
                                        <option value="Vehari">Vehari</option>
                                        <option value="Wah Cantonment">Wah Cantonment</option>
                                        <option value="Wazirabad">Wazirabad</option>
                                        <option value="" disabled>Sindh Cities</option>
                                        <option value="Badin">Badin</option>
                                        <option value="Bhirkan">Bhirkan</option>
                                        <option value="Rajo Khanani">Rajo Khanani</option>
                                        <option value="Chak">Chak</option>
                                        <option value="Dadu">Dadu</option>
                                        <option value="Digri">Digri</option>
                                        <option value="Diplo">Diplo</option>
                                        <option value="Dokri">Dokri</option>
                                        <option value="Ghotki">Ghotki</option>
                                        <option value="Haala">Haala</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Islamkot">Islamkot</option>
                                        <option value="Jacobabad">Jacobabad</option>
                                        <option value="Jamshoro">Jamshoro</option>
                                        <option value="Jungshahi">Jungshahi</option>
                                        <option value="Kandhkot">Kandhkot</option>
                                        <option value="Kandiaro">Kandiaro</option>
                                        <option value="Karachi">Karachi</option>
                                        <option value="Kashmore">Kashmore</option>
                                        <option value="Keti Bandar">Keti Bandar</option>
                                        <option value="Khairpur">Khairpur</option>
                                        <option value="Kotri">Kotri</option>
                                        <option value="Larkana">Larkana</option>
                                        <option value="Matiari">Matiari</option>
                                        <option value="Mehar">Mehar</option>
                                        <option value="Mirpur Khas">Mirpur Khas</option>
                                        <option value="Mithani">Mithani</option>
                                        <option value="Mithi">Mithi</option>
                                        <option value="Mehrabpur">Mehrabpur</option>
                                        <option value="Moro">Moro</option>
                                        <option value="Nagarparkar">Nagarparkar</option>
                                        <option value="Naudero">Naudero</option>
                                        <option value="Naushahro Feroze">Naushahro Feroze</option>
                                        <option value="Naushara">Naushara</option>
                                        <option value="Nawabshah">Nawabshah</option>
                                        <option value="Nazimabad">Nazimabad</option>
                                        <option value="Qambar">Qambar</option>
                                        <option value="Qasimabad">Qasimabad</option>
                                        <option value="Ranipur">Ranipur</option>
                                        <option value="Ratodero">Ratodero</option>
                                        <option value="Rohri">Rohri</option>
                                        <option value="Sakrand">Sakrand</option>
                                        <option value="Sanghar">Sanghar</option>
                                        <option value="Shahbandar">Shahbandar</option>
                                        <option value="Shahdadkot">Shahdadkot</option>
                                        <option value="Shahdadpur">Shahdadpur</option>
                                        <option value="Shahpur Chakar">Shahpur Chakar</option>
                                        <option value="Shikarpaur">Shikarpaur</option>
                                        <option value="Sukkur">Sukkur</option>
                                        <option value="Tangwani">Tangwani</option>
                                        <option value="Tando Adam Khan">Tando Adam Khan</option>
                                        <option value="Tando Allahyar">Tando Allahyar</option>
                                        <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                        <option value="Thatta">Thatta</option>
                                        <option value="Umerkot">Umerkot</option>
                                        <option value="Warah">Warah</option>
                                        <option value="" disabled>Khyber Cities</option>
                                        <option value="Abbottabad">Abbottabad</option>
                                        <option value="Adezai">Adezai</option>
                                        <option value="Alpuri">Alpuri</option>
                                        <option value="Akora Khattak">Akora Khattak</option>
                                        <option value="Ayubia">Ayubia</option>
                                        <option value="Banda Daud Shah">Banda Daud Shah</option>
                                        <option value="Bannu">Bannu</option>
                                        <option value="Batkhela">Batkhela</option>
                                        <option value="Battagram">Battagram</option>
                                        <option value="Birote">Birote</option>
                                        <option value="Chakdara">Chakdara</option>
                                        <option value="Charsadda">Charsadda</option>
                                        <option value="Chitral">Chitral</option>
                                        <option value="Daggar">Daggar</option>
                                        <option value="Dargai">Dargai</option>
                                        <option value="Darya Khan">Darya Khan</option>
                                        <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                        <option value="Doaba">Doaba</option>
                                        <option value="Dir">Dir</option>
                                        <option value="Drosh">Drosh</option>
                                        <option value="Hangu">Hangu</option>
                                        <option value="Haripur">Haripur</option>
                                        <option value="Karak">Karak</option>
                                        <option value="Kohat">Kohat</option>
                                        <option value="Kulachi">Kulachi</option>
                                        <option value="Lakki Marwat">Lakki Marwat</option>
                                        <option value="Latamber">Latamber</option>
                                        <option value="Madyan">Madyan</option>
                                        <option value="Mansehra">Mansehra</option>
                                        <option value="Mardan">Mardan</option>
                                        <option value="Mastuj">Mastuj</option>
                                        <option value="Mingora">Mingora</option>
                                        <option value="Nowshera">Nowshera</option>
                                        <option value="Paharpur">Paharpur</option>
                                        <option value="Pabbi">Pabbi</option>
                                        <option value="Peshawar">Peshawar</option>
                                        <option value="Saidu Sharif">Saidu Sharif</option>
                                        <option value="Shorkot">Shorkot</option>
                                        <option value="Shewa Adda">Shewa Adda</option>
                                        <option value="Swabi">Swabi</option>
                                        <option value="Swat">Swat</option>
                                        <option value="Tangi">Tangi</option>
                                        <option value="Tank">Tank</option>
                                        <option value="Thall">Thall</option>
                                        <option value="Timergara">Timergara</option>
                                        <option value="Tordher">Tordher</option>
                                        <option value="" disabled>Balochistan Cities</option>
                                        <option value="Awaran">Awaran</option>
                                        <option value="Barkhan">Barkhan</option>
                                        <option value="Chagai">Chagai</option>
                                        <option value="Dera Bugti">Dera Bugti</option>
                                        <option value="Gwadar">Gwadar</option>
                                        <option value="Harnai">Harnai</option>
                                        <option value="Jafarabad">Jafarabad</option>
                                        <option value="Jhal Magsi">Jhal Magsi</option>
                                        <option value="Kacchi">Kacchi</option>
                                        <option value="Kalat">Kalat</option>
                                        <option value="Kech">Kech</option>
                                        <option value="Kharan">Kharan</option>
                                        <option value="Khuzdar">Khuzdar</option>
                                        <option value="Killa Abdullah">Killa Abdullah</option>
                                        <option value="Killa Saifullah">Killa Saifullah</option>
                                        <option value="Kohlu">Kohlu</option>
                                        <option value="Lasbela">Lasbela</option>
                                        <option value="Lehri">Lehri</option>
                                        <option value="Loralai">Loralai</option>
                                        <option value="Mastung">Mastung</option>
                                        <option value="Musakhel">Musakhel</option>
                                        <option value="Nasirabad">Nasirabad</option>
                                        <option value="Nushki">Nushki</option>
                                        <option value="Panjgur">Panjgur</option>
                                        <option value="Pishin Valley">Pishin Valley</option>
                                        <option value="Quetta">Quetta</option>
                                        <option value="Sherani">Sherani</option>
                                        <option value="Sibi">Sibi</option>
                                        <option value="Sohbatpur">Sohbatpur</option>
                                        <option value="Washuk">Washuk</option>
                                        <option value="Zhob">Zhob</option>
                                        <option value="Ziarat">Ziarat</option>
                                </select>
                                <select class="awe-select" name="category">
                                    <option value="">Select Category</option>
                                      <option value="Boys_Hostel">Boys Hostel</option>
                                      <option value="Girls_Hostel">Girls Hostel</option>
                                      <option value="Guest_House">Guest House</option>
                                      <option value="Hotel">Hotel</option>
                                </select>
                                <label class="form-label" for="customRange1">Example range</label>
                                <span style="margin-top: -30px;">
                                <p>Search Within <span id="range_show"></span> Kilometers</p>
                                <div class="slidecontainer light__title">
                                    <input type="range" id="range_km" name="range_km" min="0.5" max="10" value="2.5" class="slider" id="myRange" oninput="sliderChange(this.value)">
                                </div>
                                </span>
                            </div>
                        </div>
                            <div class="vailability-submit">
                                <button type="submit" class="awe-btn awe-btn-13 pr30 pl30 f16 bold font-hind">@lang('lang.checkavailability')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- END / CHECK AVAILABILITY -->

            <!-- ACCOMMODATIONS -->

            <!-- <section class="ot-accomd-modations" id="acc">
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                <div class="ot-heading pt80 pb30 text-center row-20">
                                    <h2 class="mb15">@lang('lang.homesection2h2')</h2>
                                    <p class="sub">
                                        @lang('lang.homesection2para')
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="ot-accomd-modations-content owl-single" data-single_item="false" data-desktop="1" data-small_desktop="1" data-tablet="2" data-mobile="1" data-nav="false" data-pagination="false">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-1.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Luxury Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-2.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Double Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-3.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Family Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-4.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Deluxe Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-5.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Single Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-6.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Presidential Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-4.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Deluxe Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-5.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Single Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-6.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Presidential Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-1.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Luxury Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-2.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Double Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                            <div class="item room-item-style-2 mb30 text-center">
                                                <div class="outer">
                                                    <a href="#"><img class="img-responsive img-full" src="images/home-3/room/room-2-3.png" alt=""></a>
                                                    <div class="bgr pt20 pb20">
                                                        <div class="details">
                                                            <h2 class="title upper"><a href="!#">Family Room</a></h2>
                                                            <p class="price upper font-monserat f16 bold mb0 c-main">
                                                                Start from $120 per day
                                                            </p>
                                                            <div class="info">
                                                                <p class="mt20 mb40">Lorem Ipsum is simply dummy text of the
                                                                    printing and typesetting industry. Lorem Ipsum has been the
                                                                    industry's</p>
                                                                <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="!#">Click here</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->
            <!-- END / ACCOMMODATIONS -->


            <!-- ABOUT -->
            <section class="section-home-about style-2 bg-white" id="hostel">
                <div class="container">
                    <div class="home-about">
                        <div class="row v-align">
                            <div class="col-xs-12 col-sm-6">
                                <div class="img-hover-box">
                                    <div class="img">
                                        <a href="#">
                                            <!-- <img class="img-responsive img-full" src="images/home-3/about.png" alt=""> -->
                                            <img class="img-responsive img-full" src="https://thumbs.dreamstime.com/z/interior-design-do…e-interior-design-dorm-room-tourist-124690614.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="ot-heading row-20 text-center">
                                    <h2 class="mb30">@lang('lang.homesection3h2')</h2>
                                    <p class="mb30 font-hind f20 f600 pl30 pr30 lh27">@lang('lang.homesection3para')</p>
                                </div>
                                <div class="text-center">
                                    <p class="f14">
                                        @lang('lang.homesection3para2')
                                    </p>
                                    <a href="#" class="awe-btn awe-btn-default btn-medium font-hind bold f12 mt30">@lang('lang.readmore')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END / ABOUT -->

            <!-- OUR BEST -->
            <section class="section-our-best our-best-style-2 mt100 pt0 pb0 bg-white">
                <div class="container">
                    <div class="our-best">
                        <div class="row v-align">
                            <div class="col-xs-12 col-sm-6 col-sm-push-6">
                                <div class="img-hover-box">
                                    <div class="img mt0">
                                        <img class="img-responsive img-full" src="https://thumbs.dreamstime.com/z/interior-design-do…e-interior-design-dorm-room-tourist-124690614.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-sm-pull-6 ">
                                <div class="ot-heading row-20 text-center">
                                    <h2>@lang('lang.homesection3h2part2')</h2>
                                    <p class="sub f16 mb40">@lang('lang.homesection3parapart2')</p>
                                </div>
                                <div class="owl-single">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-11.png" alt="icon">
                                                <span>Free Wifi</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-12.png" alt="icon">
                                                <span>Car Parking</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-13.png" alt="icon">
                                                <span>Service Room</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-14.png" alt="icon">
                                                <span>Air Conditioner</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-15.png" alt="icon">
                                                <span>Airtel Digital TV</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-16.png" alt="icon">
                                                <span>Luggage</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-11.png" alt="icon">
                                                <span>Free Wifi</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-12.png" alt="icon">
                                                <span>Car Parking</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-13.png" alt="icon">
                                                <span>Service Room</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-14.png" alt="icon">
                                                <span>Air Conditioner</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-15.png" alt="icon">
                                                <span>Airtel Digital TV</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4 col-md-4">
                                            <div class="item">
                                                <img class="img-responsive block mb10" src="images/home-3/icon/icon-16.png" alt="icon">
                                                <span>Luggage</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- END / OUR BEST -->

            <!-- VIDEO -->
            <section class="section-video bg-23 mt100">
                <a class="btn-play" href="#modal-video-1"></a>
                <div id="modal-video-1" class="modal-video" data-video="https://www.youtube.com/embed/hfQkEbtLMGU" data-query-string="ecver=1&autoplay=1&showinfo=0&controls=0&modestbranding=1">
                    <iframe width="100%" height="400" src="" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </section>
            <!-- END / VIDEO -->

            <!-- DEALS PACKAGE -->
            <section class="section-deals mt100" id="citywise">
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div class="col col-xs-12 col-lg-6 col-lg-offset-3">
                                <div class="ot-heading row-20 mb30 text-center">
                                    <h2>@lang('lang.homesection4h2')</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row v-align">
                            <div class="col-xs-12 col-sm-6">
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/lahore.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4lahore')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Lahore}} Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Lahore')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/karachi.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4Karachi')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Karachi}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Karachi')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/islamabad.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4Islamabad')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Islamabad}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Islamabad')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/peshawar.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4Peshwer')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Peshawar}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Peshawar')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section 2 -->
                        <div class="row v-align">
                            <div class="col-xs-12 col-sm-12">
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/faisalabad.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="{{url('citywise/Faisalabad')}}">@lang('lang.homesection4Faisalbad')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Faisalabad}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Faisalabad')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/multan.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4Multan')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Multan}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Multan')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                                <div class="item item-deal">
                                    <div class="img">
                                        <img class="img-full" src="https://www.cityhostels.com.pk/assets/img/sargodha.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <a class="title bold f26 font-monserat upper" href="!#">@lang('lang.homesection4Sargodha')</a>
                                        <p class="sub font-monserat f12 f-600 upper mt10 mb20">{{$Sahiwal}}  Hostel</p>
                                        <a class="awe-btn awe-btn-12 btn-medium font-hind bold f12" href="{{url('citywise/Sahiwal')}}">@lang('lang.readmore')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END / DEALS PACKAGE -->

            <!-- NEWS -->
           <!--  <section class="section-news mt70">
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6 col-lg-offset-3">
                                <div class="ot-heading row-20 mb40 text-center">
                                    <h2>News</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="item">
                                    <div class="img">
                                        <img class="img-responsive img-full" src="images/home-3/blog/blog-1.png" alt="">
                                    </div>
                                    <div class="info">
                                        <p class="date f20">
                                            21 December, 2017
                                        </p>
                                        <a class="title font-monserat f20 mb20 block bold upper" href="!#">UPDATE MENU FOOD IN LOTUS
                                            HOTEL</a>
                                        <a class="more block f13" href="!#">[Read more]</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="item">
                                    <div class="img">
                                        <img class="img-responsive img-full" src="images/home-3/blog/blog-2.png" alt="">
                                    </div>
                                    <div class="info">
                                        <p class="date f20">
                                            06 Octorber, 2017
                                        </p>
                                        <a class="title font-monserat f20 mb20 block bold upper" href="!#">WEDDING DAY
                                            JONATHA & JESSICA</a>
                                        <a class="more block f13" href="!#">[Read more]</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="item">
                                    <div class="img">
                                        <img class="img-responsive img-full" src="images/home-3/blog/blog-3.png" alt="">
                                    </div>
                                    <div class="info">
                                        <p class="date f20">
                                            18 March, 2017
                                        </p>
                                        <a class="title font-monserat f20 mb20 block bold upper" href="!#">Bryce Canyon A Stunning Us
                                            Travel Destination</a>
                                        <a class="more block f13" href="!#">[Read more]</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="!#" class="awe-btn btn-medium font-hind bold f12 awe-btn-default mt15 awe-btn-default mt15 f13">View
                                more</a>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- END / NEWS -->

            <!-- MAP -->
            <section class="section-map style-2 clearfix " id="contact">
                <div class="contact-map">
                    <div id="map" class="awe-parallax" data-styles="silver" data-locations="39.0926986,-94.5747324--39.0912284,-94.5743515" data-center="39.0926986,-94.5747324">
                    </div>

                    <div class="container contact text-center">
                        <div class="contact-main pt40 pb60 bg-white-2">
                            <div class="ot-heading row-20 mb40 text-center">
                                <h2>@lang('lang.lastpartpara')</h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="item">
                                        <p class="f20"><i class="lotus-icon-location c-main block f30 mb20"></i>@lang('lang.address_follow')</p>
                                        <p class="description font-monserat f12 bold upper">@lang('lang.address')</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="item">
                                        <p class="f20"><i class="lotus-icon-phone c-main block f30 mb20"></i> <a href="tel:03166717394" style="color:black;"> +92-3166717394</a></p>
                                        <p class="description font-monserat f12 bold upper">@lang('lang.phone')</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="item">
                                        <p class="f20"><i class="fa fa-envelope-o c-main block f30 mb20"></i> <a href="/cdn-cgi/l/email-protection#0e666b6262614e7a666b62617a7b7d66617a6b62206d6163"><span class="__cf_email__" data-cfemail="d8b0bdb4b4b798acb0bdb4b7acadabb0b7acbdb4f6bbb7b5">
                                            <a href="mailto:Hassannasir6321@gmail.com">Hassannasir6321@gmail.com</a> 
                                        </span></a>
                                        <p class="description font-monserat f12 bold upper">@lang('lang.email')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- END / MAP -->
            @endsection

        <!-- footer -->
        @section('footer')
           @parent
        @endsection
        @section('script')
           @parent
           <script type="text/javascript">
            function sliderChange(val) {
                 var a = document.getElementById("range_show");
               var b = document.getElementById("range_km").value;
               console.warn(b);
               a.innerText = val;
               b =  val;
            }
           </script>
           <script type="text/javascript">
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlongvalue = position.coords.latitude + ","
            + position.coords.longitude;
            document.getElementById('latitude').value=latitude;
            document.getElementById('longitude').value=longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&amp;zoom=14&amp;size=530x300&amp;key=AIzaSyAa8HeLH2lQMbPeOiMlM9D1VxZ7pbGQq8o";
            document.getElementById("mapholder").innerHTML =
            "<img src='"+img_url+"'>";
         }
         function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            } else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
         function getLocation(){
            if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (showLocation, errorHandler, options);
            } else{
               alert("Sorry, browser does not support geolocation!");
            }
         }
      </script>
        <!--    <script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script> -->
        @endsection