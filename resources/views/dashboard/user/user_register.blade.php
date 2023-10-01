@extends('layouts.master')
@section('title', 'User register Page')
@section('head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
   @parent
   <style type="text/css">
      .btn-link {
    font-weight: 400;
    color: #e1bd85;
    border-radius: 0; 
}
.modal-header {
    display: flex; 
    flex-direction: row-reverse;
    flex-shrink: 0;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(0.3rem - 1px);
    border-top-right-radius: calc(0.3rem - 1px);
}
@media (min-width: 1200px){
.col-lg-4 {
    width: 33.33333333%;
    margin-top: -55%;
}
}
.loading {
    z-index: 20;
    position: absolute;
    top: 0;
    left:1px;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4);
}
.loading-content {
    position: absolute;
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    top: 40%;
    left:45%;
    animation: spin 2s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

Copy Code

   </style>
@endsection

      <!-- header -->
      @section('header')
      @parent
      @endsection
      <!-- loader -->
      @section('loader')
      @parent
      @endsection
      <!-- Content -->
      @section('content')
      @parent
    <!-- PAGE WRAP -->

    <div id="page-wrap">
      <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Students & User Register page</h2>
                        <p>Students & User register himself using this form. </p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->
        <section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
   <!--   <script type="text/javascript">
        var subcategory = {
            Male: ["1", "3", "5","7","9"],
            Female: ["0", "2", "4","6","8"]
        }

        function makeSubmenu(value) {
        if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
        else {
            var citiesOptions = "";
            for (categoryId in subcategory[value]) {
                citiesOptions += "<option value='"+subcategory[value][categoryId]+"'>" + subcategory[value][categoryId] + "</option>";
            }
            document.getElementById("categorySelect").innerHTML = citiesOptions;
        }
        }

        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
            alert(country + "\n" + city);
        }
        var body = document.getElementsByTagName("body")[0];

        body.addEventListener("load", init(), false);

        function init() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("categorySelect").selectedIndex = 0;
        };
    </script> -->
   
    <div class="container">
        @if(session()->has('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
                  @endif
                  @if(session()->has('fail'))
                  <div class="alert alert-success">
                      {{ session()->get('fail') }}
                  </div>
                  @endif
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            The best offer <br />
            <span class="" style="color:#e1bd85;">for your business</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-8 mb-5 mb-lg-0" onloadstart="showLoading()">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form role="form" action="create" method="post" class="was-validated" enctype="multipart/form-data">
                @csrf
                <!-- first  Name input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter First Name *</label>
                  <input type="text" id="form3Example3" name="fname" class="form-control form-control-lg  @error('fname') is-invalid @enderror" required 
                  value="{{old('fname')}}" placeholder="Enter Your First-Name"  />
                  <span class="text-danger">@error('fname'){{$message}} @enderror</span>
                </div>
                <!-- Last Name input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter Last Name *</label>
                  <input type="text" id="form3Example3" name="lname" class="form-control form-control-lg  @error('lname') is-invalid @enderror" required 
                  value="{{old('lname')}}" placeholder="Enter Your Last-Name"/>
                  <span class="text-danger">@error('lname'){{$message}} @enderror</span>
                </div>
                <!-- Select Gender -->
                <div class="col-12 col-md-12 ">
                <div class="form-group col-12 col-md-4  mb-4">
                    <label class="control-label">Select Gender *</label>
                    <select id="category" size="1"name="gender" onchange="gender(this.value)"
                    class="form-control form-control-lg  @error('gender') is-invalid @enderror" value="{{old('gender')}}" required>
                    <option value="Male" disabled selected>Select Gender</option>
                    <option value="Male" >Male</option>
                    <option value="Female">Female</option>
                    </select>
                    <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                </div>
                <!-- Cnic No input -->
                <div class="form-outline col-12 col-md-8 mb-4">
                  <label class="form-label" for="form3Example3">Enter Cnic No *</label>
                  <input type="number" id="cnic" name="cnic" class="form-control form-control-lg  @error('cnic') is-invalid @enderror" required   onchange="cniccheck(this.value)"
                  value="{{old('cnic')}}" placeholder="Enter 13 Cnic Digits" />
                  <span class="text-danger" id="cnicdemp"></span>
                  <span class="text-success" id="cnicvalid"></span>
                  <span class="text-danger">@error('cnic'){{$message}} @enderror</span>
                </div>
                <script type="text/javascript">
                    function gender(val) {
                          var gender = document.getElementById('category').value;
                        var cnic = document.getElementById('cnic').value;
                        var cnicdemp = document.getElementById('cnicdemp');
                        var cnicvalid = document.getElementById('cnicvalid');
                             if (gender == 'Male') {
                            console.warn(gender);
                            const last1 = cnic.slice(-1);
                            if (last1 == 1 || last1 == 3 || last1 == 5 || last1 == 7 ||last1 == 9) {
                                   cnicvalid.innerText = 'your format is valid';
                                   console.warn(last1); 
                                }else{
                                cnicdemp.innerText = 'your format is not valid';
                                console.warn(last1);
                                 }
                                }else if (gender == 'Female'){
                                     const last1 = cnic.slice(-1);
                            if (last1 == 2 || last1 == 4 || last1 == 6 || last1 == 8 ||last1 == 0) {
                                   cnicvalid.innerText = 'your format is valid';
                                   console.warn(last1); 
                                }else{
                                cnicdemp.innerText = 'your format is not valid';
                                console.warn(last1);
                                 }
                                        console.warn(last1);
                                }
                            
                    }
                </script>
                <script type="text/javascript">

                    function cniccheck(val) {
                       
                        var gender = document.getElementById('category').value;
                        var cnic = document.getElementById('cnic').value;
                        var cnicdemp = document.getElementById('cnicdemp');
                        var cnicvalid = document.getElementById('cnicvalid');
                        if(cnic.length == 13){
                             if (gender == 'Male') {
                            console.warn(gender);
                            const last1 = cnic.slice(-1);
                            if (last1 == 1 || last1 == 3 || last1 == 5 || last1 == 7 ||last1 == 9) {
                                   cnicvalid.innerText = 'your format is valid';
                                   cnicdemp.innerText = '';
                                   console.warn(last1); 
                                }else{
                                cnicdemp.innerText = 'your format is not valid';
                                 cnicvalid.innerText = '';
                                console.warn(last1);
                                 }
                                }else if (gender == 'Female'){
                                     const last1 = cnic.slice(-1);
                            if (last1 == 2 || last1 == 4 || last1 == 6 || last1 == 8 ||last1 == 0) {
                                   cnicvalid.innerText = 'your format is valid';
                                   cnicdemp.innerText = '';
                                   console.warn(last1); 
                                }else{
                                cnicdemp.innerText = 'your format is not valid';
                                cnicvalid.innerText = '';
                                console.warn(last1);
                                 }
                                        console.warn(last1);
                                }
                            }
                            else{
                                cnicdemp.innerText = 'your format length is not valid';
                            }
                        }
                </script>
                <!-- Last no of Cnic -->
                <!-- <div class="form-outline col-12 col-md-4  mb-4">
                  <label class="form-label" for="form3Example3">Select Digit *</label>
                    <select id="categorySelect" name="cnic_digit" size="1" class="form-control form-control-lg  @error('cnic_digit') is-invalid @enderror" value="{{old('cnic_digit')}}" required> 
                    <option value="" disabled selected>Choose Subcategory</option>
                    <option></option>
                    </select>
                  <span class="text-danger">@error('cnic_digit'){{$message}} @enderror</span>
                </div> -->
                </div>
                <!-- Phone No input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter Phone No *</label>
                  <input type="number" id="phone_no" name="phoneno" class="form-control form-control-lg  @error('phoneno') is-invalid @enderror" required value="{{old('phoneno')}}" placeholder="Enter 11 Digits of phoneno" onchange="phone(this.value)" />
                  <span class="text-success" id="validpheno"></span>
                  <span class="text-danger" id="errorphone"></span>
                  <span class="text-danger">@error('phoneno'){{$message}} @enderror</span>
                </div>
                <script type="text/javascript">
                    function phone(val) {
                        var phonedata =  document.getElementById('phone_no').value;
                        var errorphone = document.getElementById('errorphone');
                        var validpheno = document.getElementById('validpheno');
                        console.warn(phonedata);
                        if (phonedata.length == 11) {
                            validpheno.innerText = "Phone No length is valid";
                             errorphone.innerText = "";
                        }else{
                            errorphone.innerText = "Phone No length is not valid";
                            validpheno.innerText = "";
                        }
                    }
                </script>
                <!-- select country, state,city -->
                <div class="row">
                    <div class="col-md-12 col-12 ">
                        <div class="form-group col-12 col-md-4 mb-4">
                            <label class="control-label"> Country *</label>
                            <select name="country" id="country" class="form-control form-control-lg  @error('country') is-invalid @enderror" value="{{old('country')}}"required> 
                            <option value=""  disabled >Select Country *</option>
                            <option selected value="Pakistan">Pakistan</option>
                            </select>
                            <span class="text-danger">@error('country'){{$message}} @enderror</span>
                        </div>
                        <!-- Select State -->
                        <div class="form-group col-12 col-md-4 mb-4">
                            <label class="control-label">Select Province *</label>
                            <select name="state" id="state" class="form-control form-control-lg  @error('state') is-invalid @enderror" required value="{{old('state')}}" >
                            <option value=""  disabled selected>Select Province</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                            <option value="KPK">KPK</option>
                            <option value="Azad kashmir">Azad kashmir</option>
                            <option value="Balochistan">Balochistan</option>
                            </select>
                            <span class="text-danger">@error('state'){{$message}} @enderror</span>
                        </div>  
                        <!--select city  -->
                        <div class="form-group col-12 col-md-4 mb-4">
                            <label class="control-label">Select city *</label>
                            <select name="city" id="city" class="form-control form-control-lg  @error('city') is-invalid @enderror" required value="{{old('city')}}">
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
                            <span class="text-danger">@error('city'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div>
                <!-- Current Address input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter Current Address</label>
                  <input type="text" id="form3Example3" name="address" class="form-control form-control-lg  @error('address') is-invalid @enderror" required 
                  value="{{old('address')}}" placeholder="Enter Your Address" />
                  <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Enter Email *</label>
                  <input type="email" id="form3Example3" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror"  title="Three letter country code" placeholder="Enter Your Email" 
                  pattern="[a-zA-Z0-9]+\@gmail.com" value="{{old('email')}}" />
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Enter Password *</label>
                  <input type="password" id="form3Example4" name="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" required  
                  value="{{old('password')}}" placeholder="Enter Your Password" />
                   <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>
                <!--confirm Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Enter Confirm Password *</label>
                  <input type="password" id="form3Example4" name="con_password" class="form-control form-control-lg  @error('con_password') is-invalid @enderror" required  
                  value="{{old('con_password')}}" placeholder="Enter Your Confirm Password" />
                  <span class="text-danger">@error('con_password'){{$message}} @enderror</span>
                </div>
                <!-- <div class="row gx-3">
                    <div class="col-12 col-md-12 d-flex">

                        <div class="form-outline mb-4 col-4">
                            <img id="uploadPreview1" style="width: 100px; height: 100px;" />
                            <label class="form-label col-12 col-md-12 mt-3 mb-4 pb-3">Select Profile images</label>
                            <input id="uploadImage1" type="file" class="form-control form-control-lg  @error('myphoto') is-invalid @enderror" required  name="myphoto" onchange="PreviewImage1();" value="{{old('myphoto')}}" accept="image/*" style="margin-left: -10px;" />
                            <span class="text-danger">@error('myphoto'){{$message}} @enderror</span>
                        </div>
   
                        <div class="form-outline mb-4 col-4">
                            <img id="uploadPreview2" style="width: 100px; height: 100px;" />
                            <label class="form-label col-12 col-md-12 mt-3">Select Front Image (CNIC/Student ID)</label>
                            <input id="uploadImage2" type="file" class="form-control form-control-lg  @error('front_photo') is-invalid @enderror" required  name="front_photo" onchange="PreviewImage2();"  
                            value="{{old('front_photo')}}" accept="image/*" style="margin-left:-5px;" />
                            <span class="text-danger">@error('front_photo'){{$message}} @enderror</span>
                        </div>
                 
                        <div class="form-outline mb-4 col-4">
                            <img id="uploadPreview3" style="width: 100px; height: 100px;" />
                            <label class="form-label col-12 col-md-12 mt-3">Select Back Image (CNIC/Student ID)</label>
                            <input id="uploadImage3" type="file" class="form-control form-control-lg  @error('back_photo') is-invalid @enderror" required  name="back_photo" onchange="PreviewImage3();" accept="image/*"
                            value="{{old('back_photo')}}"/>
                            <span class="text-danger">@error('back_photo'){{$message}} @enderror</span>
                        </div>
                    </div>
                </div> -->
                <!-- Checkbox -->
                <!-- <div class="form-check mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Subscribe to our newsletter
                  </label>
                </div> -->

                <!-- Submit button   onclick="showLoading()"  --> 
                <button type="submit"  class="btn btn-block mb-4" style="background-color:#e1bd85;">
                  Sign up
                   <section id="loading">
                    <div id="loading-content"></div>
                  </section>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
              @endsection

<!-- footer -->
@section('footer')
@parent
@endsection
@section('script')
@parent
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
//       $(":text, :file, :checkbox, select, textarea").each(function() {
//    if($(this).val() === "")
//      alert("Empty Fields!!");

   
// });
function showLoading() {
  document.querySelector('#loading').classList.add('loading');
  document.querySelector('#loading-content').classList.add('loading-content');
}
body.addEventListener('load',hideLoading);
function hideLoading() {
  document.querySelector('#loading').classList.remove('loading');
  document.querySelector('#loading-content').classList.remove('loading-content');
}
    function PreviewImage1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview1").src = oFREvent.target.result;
        };
    };
function PreviewImage2() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage2").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview2").src = oFREvent.target.result;
        };
    };
    function PreviewImage3() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage3").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview3").src = oFREvent.target.result;
        };
    };
</script>
@endsection