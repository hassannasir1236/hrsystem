@extends('layouts.user')
@section('content')
<div class="container">
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success mt-5 col-12">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('fail'))
            <div class="alert alert-danger mt-5 col-12">
                {{ session()->get('fail') }}
            </div>
        @endif
        <div class="col-12 col-md-12 ml-auto d-flex justify-content-end mt-5">
            <button class="btn btn-warning" id="toggle">Update Profile</button>
        </div>
        <div class="col-12 col-md-4">
            <div class="card pt-4 mb-4 shadow mt-5 rounded-6" style="background-color: #eee">
                <h3 class="text-center pt-4 mb-4">User Logo</h3>
                <div class="bg-image hover-overlay ripple rounded-circle text-center" data-mdb-ripple-color="light">
                    @if(Auth::guard('web')->user()->avatar)
                      <img
                       src="{{Auth::guard('web')->user()->avatar}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                        style="border: 14px solid #c5c1c1;"
                      />
                      @elseif(Auth::guard('web')->user()->my_new_photo)
                       <img
                       src="{{asset('profile/'.Auth::guard('web')->user()->my_new_photo)}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                        style="border: 14px solid #c5c1c1;"
                      />
                      @else
                      <img
                        src="{{asset('images/dummy.png')}}"
                        class="rounded-circle img-fluid w-50 rounded-circle"
                        loading="lazy"
                         style="border: 14px solid #c5c1c1;"
                      />
                      @endif
                        
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body text-center" >
                    <form action="{{route('user.user_UpdateProfile')}}" method="post" enctype="multipart/form-data" style="display:flex; justify-content:center; align-items:center; flex-direction: column;">
                        @csrf
                        <label for="logo-upload" id="logo-upload-container">
                            <div class="text-center" style="margin-top: 8px;">
                            <span class="text-center" style="cursor: pointer;">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <span >Upload profile</span>
                            </span>
                            </div>
                            <input type="file" id="logo-upload" name="user_profile" accept=".jpg,.jpeg,.png"  style="display: none;">
                            <span class="text-danger"> @error('user_profile'){{$message}}@enderror</span>
                        </label>
                        <input type="submit" class="btn btn-outline-warning mt-3">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card pt-4 mb-4 shadow mt-5 rounded-6">
              <div class="card-body">
                <div class="card-body" id="myDIV" style="display: block;">
                    
                    <div class="row">
                        <div class="col-12 mb-4 d-flex justify-content-center align-items-center">
                            <h3 class="text-center d-flex justify-content-center align-items-center">
                                 <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                                Your Profile
                            </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">First Name:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->fname}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Last Name:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->lname}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Address:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->address}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Cnic No:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->cnic}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Phone No:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->phoneno}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Email:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">State:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->state}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">Country:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->country}}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <b class="mb-0">City:</b>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{Auth::user()->city}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="myDIV2" style="display:none;">
                    <div class="col m-3">
                       <h3 class="d-flex align-items-center "> 
                        <i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i>
                           Edit Your Profile
                        </h3>
                    </div>
                    <form action="{{Route('user.UserUpdateProfile')}}" method="post"  >
                        @csrf
                            <!-- first  Name input -->
                            <div class="form-outline mb-4">
                              <input type="text" id="form3Example3" name="fname" class="form-control form-control-lg  @error('fname') is-invalid @enderror" required 
                              value="{{Auth::user()->fname}}" placeholder="Enter Your First-Name"  />
                              <label class="form-label" for="form3Example3">Enter First Name 
                                <span class="text-danger">*</span></label>
                              <span class="text-danger">@error('fname'){{$message}} @enderror</span>
                            </div>
                            <!-- Last Name input -->
                            <div class="form-outline mb-4">
                              <input type="text" id="form3Example3" name="lname" class="form-control form-control-lg  @error('lname') is-invalid @enderror" required 
                              value="{{Auth::user()->lname}}" placeholder="Enter Your Last-Name"/>
                              <label class="form-label" for="form3Example3">Enter Last Name <span class="text-danger">*</span></label>
                              <span class="text-danger">@error('lname'){{$message}} @enderror</span>
                            </div>
                            <!-- Select Gender -->
                            <div class="col-12 col-md-12 d-flex gap-3 justify-content-center align-items-center">
                            <div class=" col  mb-4">
                                <select id="category" name="gender" onchange="gender(this.value)"
                                class="select form-control-lg w-100 @error('gender') is-invalid @enderror" value="" required>
                                <option value="{{Auth::user()->gender}}" selected>{{Auth::user()->gender}}</option>
                                <option value="Male" >Male</option>
                                <option value="Female">Female</option>
                                </select>
                                <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                            </div>
                            <!-- Cnic No input -->
                            <div class="form-outline col mb-4">
                              
                              <input type="number" id="cnic" name="cnic" class="form-control form-control-lg  @error('cnic') is-invalid @enderror" required   onchange="cniccheck(this.value)" readonly 
                              value="{{Auth::user()->cnic}}" placeholder="Enter 13 Cnic Digits" />
                              <label class="form-label" for="form3Example3">Enter Cnic No <span class="text-danger">*</span></label>
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
                            </div>
                            <!-- Phone No input -->
                            <div class="form-outline mb-4">
                             
                              <input type="number" id="phone_no" name="phoneno" class="form-control form-control-lg  @error('phoneno') is-invalid @enderror" required value="{{Auth::user()->phoneno}}" placeholder="Enter 11 Digits of phoneno" onchange="phone(this.value)" />
                               <label class="form-label" for="form3Example3">Enter Phone No <span class="text-danger">*</span></label>
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
                                <div class="col-md-12 col-12 d-flex justify-content-center align-items-center gap-3 ">
                                    <div class=" col mb-4">
                                        <select name="country" id="country" class="select w-100 form-control-lg   @error('country') is-invalid @enderror" required> 
                                        <option value=""  selected >{{Auth::user()->country}} <span class="text-danger">*</span></option>
                                        <option selected value="Pakistan">Pakistan</option>
                                        </select>
                                        <span class="text-danger">@error('country'){{$message}} @enderror</span>
                                    </div>
                                    <!-- Select State -->
                                    <div class="col mb-4">
                                        <select name="state" id="state" class="select w-100 form-control-lg @error('state') is-invalid @enderror" required  >
                                        <option value="{{Auth::user()->state}}" selected>{{Auth::user()->state}}</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="KPK">KPK</option>
                                        <option value="Azad kashmir">Azad kashmir</option>
                                        <option value="Balochistan">Balochistan</option>
                                        </select>
                                        <span class="text-danger">@error('state'){{$message}} @enderror</span>
                                    </div>  
                                    <!--select city  -->
                                    <div class="col mb-4">
                                        <select name="city" id="city" class="select form-control-lg w-100 @error('city') is-invalid @enderror" required >
                                            <option value="{{Auth::user()->city}}" selected>{{Auth::user()->city}}</option>
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
                              <input type="text" id="form3Example3" name="address" class="form-control-lg form-control @error('address') is-invalid @enderror" required 
                              value="{{Auth::user()->address}}" placeholder="Enter Your Address" />
                               <label class="form-label" for="form3Example3">Enter Your Address <span class="text-danger">*</span></label>
                              <span class="text-danger">@error('address'){{$message}} @enderror</span>
                            </div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                             
                              <input type="email" id="form3Example3" name="email" class="form-control form-control-lg  @error('email') is-invalid @enderror"  title="Three letter country code" placeholder="Enter Your Email" 
                              pattern="[a-zA-Z0-9]+\@gmail.com" value="{{Auth::user()->email}}" readonly/>
                               <label class="form-label" for="form3Example3">Enter Email <span class="text-danger">*</span></label>
                              <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <button type="submit"  class="btn btn-block mb-4" style="background-color:#e1bd85;">
                              Save Changes
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
<script type="text/javascript">
    var btn = document.getElementById('toggle');
    btn.onclick = function () {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("myDIV2");
  if (x.style.display == "block") {
    x.style.display = "none";
    y.style.display = "block";
    btn.innerText = 'Close';
    // btn.style.backgroundColor = #a8e41bc9;
  } else {
    x.style.display = "block";
    y.style.display = "none";
     btn.innerText = 'Update Profile';
     // btn.style.backgroundColor =  #e4a11b;
  }
}
</script>
@endsection
