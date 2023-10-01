
@extends('layouts.admin_index')
 @section('link')
 <style type="text/css">
   .bg-warning, .bg-warning>a {
    color: #ffff;
}
.change-to-me{
 background-color: #e1bd85;
}
.icon_setting{
  text-align: center;
  display: inline-flex;
    align-items: center;
}
  input[type="checkbox"] {
       color: #e1bd85;
    }
    .fontawesomeicon {
      margin-left: 7px;
    margin-right: 10px;
    }
#map { 
      height: 300px;  
      width: 100%;     
      } 
 </style>
 @endsection
@section('content')
@parent
  <div class="content-wrapper">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center pt-5 mb-5">
          @if(session()->has('success'))
              <div class="alert alert-success col-12">
                  {{ session()->get('success') }}
              </div>
          @endif
          @if(session()->has('fail'))
              <div class="alert alert-danger col-12">
                  {{ session()->get('fail') }}
              </div>
          @endif
          <div class="col-12 col-md-12">
            <div class="card shadow">
              <div class="card-header ">
                <h3 class="text-center">
                  <i class="fas fa-trash-alt"></i>
                  Delete Hostel Images
                </h3>
              </div>
              <div class="card-body">
                <div class="row">

             @foreach(explode(',', $data->new_filenames)  as  $key => $project)
             <div class="col-md-4 col-12 d-flex justify-content-center align-items-center flex-column shadow  {{$key == 1 ? 'active' : '' }}">
                <img class="d-block" src="{{ asset('hostelimg_upload/'.$project) }}" alt="First slide" 
                style="width: 347px;height:400px;">
                 <form action="delete/{{ $key }}" method="post">
                  @csrf
                    {{ method_field('delete') }}
                      <!-- Alert::success('Success Title', 'Success Message'); -->
                      <input type="hidden" name="deletekey" value=" {{$key}}">
                    <button class="btn btn-outline-danger mt-4 mb-4 show_confirm" type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
              </div>
             
              @endforeach
              </div>
            </div>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="card sahdow">
              <div class="card-header">
                <h3 class="text-center">
                  <i class="fas fa-file-upload"></i>
                  Upload Hostel images
                </h3>
              </div>
              <div class="card-body">
                @if($countimage>=6)
                <h3 class="text-danger">Please first Delete some images then you can access the uploded option.You are Uploded the more than 6 images.</h3>
                @else
                <form action="upload" method="post" enctype="multipart/form-data">
                  @csrf
                  @foreach(explode(',', $data->new_filenames)  as  $key => $project)
                  <input type="hidden" name="filenames[]" value="{{$data->new_filenames}}">
                  @endforeach
                  <div class="input-group hdtuto control-group lst increment" >
                      <input type="file" id="fileset" name="filenames[]" class="form-control myfrm form-control-lg  @error('filenames') is-invalid @enderror" accept="image/*" 
                      value="{{old('filenames')}}" required>
                      <div class="input-group-btn"> 
                        <button class="btn btn-success ml-4" type="button" style="margin-left: 5px;
                        margin-right: -12px;"><i class="fa fa-plus" aria-hidden="true"></i>Add More images</button>
                      </div>
                      <span class="text-danger">@error('filenames'){{$message}} @enderror</span>
                    </div>
                    <div class="clone ">
                      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="filenames[]" class="myfrm form-control form-control-lg  @error('filenames') is-invalid @enderror" accept="image/*" required value="{{old('filenames')}}">
                        <div class="input-group-btn"> 
                          <button class="btn btn-danger ml-4" type="button" style="margin-left: 5px;"><i class="fa fa-times" aria-hidden="true"></i> Remove Image</button>
                        </div>
                      </div>
                      <span class="text-danger">@error('filenames'){{$message}} @enderror</span>
                    </div>
                    <input type="submit" class="btn btn-primary mt-4" style="float:right;">
                </form>
                @endif
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">
                <i class="fa fa-crosshairs" aria-hidden="true"></i>
                Update Your Hostel Location
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{route('owner.LocationChanges')}}">
                  @csrf
                  <div class="row">
                    <button type="button" onclick="getLocation();" style="color:black;" class="awe-btn awe-btn-6 btn btn-warning mb-4 text-dark col-12 d-flex align-items-center justify-content-center" value="Get Location"/>Click Here for location   
                     <i class="fa fa-crosshairs fa-2x " aria-hidden="true"></i>
                     </button>
                     <span class="text-danger text-center col">@error('h_latitude'){{$message}} @enderror</span>
                    
                    <input type="hidden" name="h_latitude" id="latitude" value="">
                    <input type="hidden" name="h_longitude" id="longitude" value=""> 
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-6">
                      <h4 class="col text-center">Previous Location</h4>
                      <div id="map" ></div>
                    </div>
                    <div class="col-md-6 col-6">
                      <h4 class="col text-center">Current Location</h4>
                      <div id="mapholder"></div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary float-right">
                    Save Changes
                  </button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">
                  <i class="fas fa-edit"></i>
                  Edit Hostel Details
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{route('owner.EditHostelDetails')}}">
                  @csrf
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label class="control-label">Enter Hostel Name *</label>
                        <input type="text" name="h_name" class="form-control form-control-lg  @error('h_name') is-invalid @enderror" required value="{{$data->h_name}}" placeholder="Enter Hostel Name"  />
                        <span class="text-danger">@error('h_name'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                      <label class="control-label">Enter Hostel Phone No *</label>
                      <input  type="number" name="h_phoneno" class="form-control form-control-lg  @error('h_phoneno') is-invalid @enderror" required value="{{$data->h_phoneno}}" placeholder="Enter Hostel Phone No *" />
                      <span class="text-danger">@error('h_phoneno'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label class="control-label">Select State *</label>
                        <select  id="state" name="h_state" class="form-control form-control-lg  @error('h_state') is-invalid @enderror" required value="{{$data->h_state}}">
                        <option value="{{$data->h_state}}" selected>{{$data->h_state}}</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Sindh">Sindh</option>
                        <option value="KPK">KPK</option>
                        <option value="Azad kashmir">Azad kashmir</option>
                        <option value="Balochistan">Balochistan</option>
                        </select>
                        <span class="text-danger">@error('h_state'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                         <label class="control-label">Enter Hostel Address *</label>
                        <input  type="text" name="h_address" class="form-control form-control-lg  @error('h_address') is-invalid @enderror" required value="{{$data->h_address}}" placeholder="Enter Hostel Address *" /> <span class="text-danger">@error('h_address'){{$message}} @enderror</span>
                    </div>
                  </div> 
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter Some Details About Your Hostel</label>
                        <textarea name="h_details" class="form-control form-control-lg @error('h_details') is-invalid @enderror" required value="{{$data->h_details}}" rows="10"
                        placeholder="Enter Some Details About Your Hostel">{{$data->h_details}}</textarea>
                        <span class="text-danger">@error('h_details'){{$message}} @enderror</span>
                    </div>
                  </div> 
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label class="control-label">Enter Hostel Slug for Url</label>
                        <input type="text" name="h_slug" class="form-control form-control-lg  @error('h_slug') is-invalid @enderror" required value="{{$data->h_slug}}" placeholder="Enter Hostel Slug for Url" />
                        <span class="text-danger">@error('h_slug'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <!-- Hostel Category -->
                        <label class="control-label">Select Hostel Category*</label>
                        <select name="h_category" id="h_category" class="form-control form-control-lg  @error('h_category') is-invalid @enderror" required value="{{$data->h_category}}" >
                          <option value="{{$data->h_category}}">{{$data->h_category}}</option>
                          <option value="Boys_Hostel">Boys Hostel</option>
                          <option value="Girls_Hostel">Girls Hostel</option>
                          <option value="Guest_House">Guest House</option>
                          <option value="Hotel">Hotel</option>
                        </select>
                        <span class="text-danger">@error('h_category'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label class="control-label">Select Country *</label>
                        <select  name="h_country" class="form-control countries form-control-lg  @error('h_country') is-invalid @enderror " required value="{{old('h_country')}}" id="countryId">
                          <option value="{{$data->h_country}}"  selected>{{$data->h_country}}</option>
                          <option value="Pakistan">Pakistan</option>
                        </select>
                        <span class="text-danger">@error('h_country'){{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label class="control-label">Select City *</label>
                    <select  id="Location" name="h_city" class="form-control mb-5 form-control-lg  @error('h_city') is-invalid @enderror" required 
                        value="{{$data->h_city}}">
                            <option value="{{$data->h_name}}" selected>{{$data->h_city}}</option>
                            <option disabled> <b>Select City</b></option>
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
                    <span class="text-danger">@error('h_city'){{$message}} @enderror</span>
                    </div>
                  </div> 
                  <div class="row">
                        <div class="form-group col-3 col-md-3 " style="margin-top: -29px;">
                            <label class="control-label">Enter Estimated Rent (Per Month)</label>
                            <input type="number" name="h_rent" id="rent_security" class="form-control form-control-lg  @error('h_rent') is-invalid @enderror" required value="{{$data->h_rent}}" placeholder="Estimated Rent (Per Month)" >
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_rent'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="rent_period" id="rent_period" class="form-control form-control-lg  @error('rent_period') is-invalid @enderror" required value="{{$data->rent_period}}">
                              <option value="{{$data->rent_period}}" selected>{{$data->rent_period}}</option>
                              <option value=""> <b>Rent Period</b></option>
                              <option value="Per Night">Per Night</option>
                              <option value="Per Week">Per Week</option>
                              <option value="Per Month">Per Month</option>
                              <option value="After 2 Months">After 2 Months</option>
                              <option value="After 6 Months">After 6 Months</option>
                              <option value="Anually">Anually</option>     
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('rent_period'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="bills_included" id="bills_included" class="form-control form-control-lg  @error('bills_included') is-invalid @enderror" required value="{{$data->bills_included}}">
                              <option value="{{$data->bills_included}}" selected>{{$data->bills_included}}</option>
                              <option value="" disabled > <b>Bills Included</b></option>
                              <option value="Bills Included">Yes</option>
                              <option value="Bills Not Included">No</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('bills_included'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="letting_type" id="letting_type" class="form-control form-control-lg  @error('letting_type') is-invalid @enderror" required value="{{$data->letting_type}}">
                              <option value="{{$data->letting_type}}" selected>{{$data->letting_type}}</option>
                              <option value="" disabled> <b>Letting Type</b></option>
                              <option value="Long Term">Long Term</option>
                              <option value="Monthly">Monthly</option>
                              <option value="Weekly">Weekly</option>
                              <option value="Short Term">Short Term</option>
                              <option value="Daily">Daily</option>                  
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('letting_type'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="hostel_area" id="hostel_area" class="form-control form-control-lg  @error('hostel_area') is-invalid @enderror" required value="{{$data->hostel_area}}">
                              <option value="{{$data->hostel_area}}" selected>{{$data->hostel_area}}</option>
                              <option value="" disabled> <b>Select Hostel Size</b></option>
                              <option value="5 Marla">5 Marla</option>
                              <option value="10 Marla">10 Marla</option>
                              <option value="15 Marla">15 Marla</option>
                              <option value="1 Canal">1 Canal</option>
                              <option value="2 Canal">2 Canal</option>
                              <option value="3 Canal">3 Canal</option>
                              <option value="4 Canal">4 Canal</option>
                              <option value="In Plaza">In Plaza</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('hostel_area'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_condition" id="condition" class="form-control form-control-lg  @error('h_condition') is-invalid @enderror" required value="{{$data->h_condition}}">
                              <option value="{{$data->h_condition}}" selected>{{$data->h_condition}}</option>
                              <option disabled value=""> <b>Condition</b></option>
                              <option value="Furnished">Furnished</option>
                              <option value="Semi-Furnished">Semi-Furnished</option>
                              <option value="Not-Furnished">Not-Furnished</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_condition'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_floor" id="floor" class="form-control form-control-lg  @error('h_floor') is-invalid @enderror" required value="{{$data->h_floor}}">
                              <option value="{{$data->h_floor}}" selected>{{$data->h_floor}}</option>
                              <option disabled value=""> <b>Select Floor</b></option>
                              <option value="Full Building">Full Building</option>
                              <option value="Basement">Basement</option>
                              <option value="Ground Floor">Ground Floor</option>
                              <option value="1st Floor">1st Floor</option>
                              <option value="2nd Floor">2nd Floor</option>
                              <option value="3rd Floor">3rd Floor</option>
                              <option value="4th Floor">4th Floor</option>
                              <option value="5th Floor">5th Floor</option>
                              <option value="6th Floor">6th Floor</option>
                              <option value="7th Floor">7th Floor</option>
                              <option value="8th Floor">8th Floor</option>                  
                              <option value="9th Floor">9th Floor</option>
                              <option value="10th Floor">10th Floor</option>                  
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_floor'){{$message}} @enderror</span>
                        </div> 
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_schedule" id="schedule" class="form-control form-control-lg  @error('h_schedule') is-invalid @enderror" required value="{{$data->h_schedule}}">
                              <option selected value="{{$data->h_schedule}}">{{$data->h_schedule}}</option>
                              <option value="" disabled> <b>Hostel Schedule</b></option>
                              <option value="All Days">All Days</option>
                              <option value="Off On Officially Events">Off On Official Events</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_schedule'){{$message}} @enderror</span>
                        </div>   
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_bathroom" id="bathroom" class="form-control form-control-lg  @error('h_bathroom') is-invalid @enderror" required value="{{$data->h_bathroom}}">
                              <option value="{{$data->h_bathroom}}" selected>{{$data->h_bathroom}}</option>
                              <option disabled value="">  <b>Bathroom</b></option>
                              <option value="Attachded">Attachded</option>
                              <option value="No-Attached">No-Attached</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_bathroom'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_mess" id="mess" class="form-control form-control-lg  @error('h_mess') is-invalid @enderror" required value="{{$data->h_mess}}">
                              <option value="{{$data->h_mess}}" selected>{{$data->h_mess}}</option>
                              <option disabled value=""> <b> Mess</b></option>
                              <option value="Mess Included">Included</option>
                              <option value="Mess Not-Included">Not-Included</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_mess'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_lawn" id="lawn" class="form-control form-control-lg  @error('h_lawn') is-invalid @enderror" required value="{{$data->h_lawn}}" >
                              <option value="{{$data->h_lawn}}" selected>{{$data->h_lawn}}</option>
                              <option value="" disabled> <b> Open Area Lawn</b></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_lawn'){{$message}} @enderror</span>
                        </div>
                        <div class="form-group col-3 col-md-3 ">
                            <select name="h_occopancy" id="occopancy" class="form-control form-control-lg  @error('h_occopancy') is-invalid @enderror" required value="{{$data->h_occopancy}}">
                              <option selected value="{{$data->h_occopancy}}">{{$data->h_occopancy}}</option>
                              <option disabled value=""> <b> Occopancy</b></option>
                              <option value="Single Bed">Single Bed</option>
                              <option value="2 Beds">2 Beds</option>
                              <option value="3 Beds">3 Beds</option>
                              <option value="4 Beds">4 Beds</option>
                              <option value="5 Beds">5 Beds</option>
                              <option value="6 Beds">6 Beds</option>
                              <option value="7 Beds">7 Beds</option>
                              <option value="2 Beds - 8 Beds">2 Beds - 8 Beds</option>
                              <option value="2 Beds - 4 Beds">2 Beds - 4 Beds</option>
                              <option value="2 Beds - 5 Beds">2 Beds - 5 Beds</option>
                            </select>
                            <span class="help-block"></span>
                            <span class="text-danger">@error('h_occopancy'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary float-right" >
                 
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-12 text-center">
            <div class="card">
              <div class="card-header">
                <h3 class="text-center">
                  <i class="fas fa-wrench"></i>
                  Hostel Facilities
                </h3>
              </div>
              <div class="card-body">
                <h5 class="text-center"><i class="fas fa-step-backward"></i>
                Selected Previous Facilites</h5>
               <span > {!! $data->facilities !!}</span>
               <hr>
               <h5 class="text-center"><i class="fas fa-check-circle"></i>
               Select New Facilites</h5>
                <form method="post" action="{{route('owner.facilities')}}">
                  @csrf
                  <div class="row">
                    <h4 class="text-danger text-center col">
                      @error('facilities'){{$message}}@enderror
                    </h4>
                    <div class="col-12 col-md-12">

                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton1" style="display: inline;">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton1" value="<i class='fa fa-bolt ml-3 facility'></i> Electricity Backup" name="facilities[]" id="select_product" 
                         > <i class="fa fa-bolt fontawesomeicon"></i> Electricity Backup
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting"  id="targetButton2" style="display: inline;">
                        <input type="checkbox" id="select_product" class="facility checkbox" data-target="targetButton2" value="<i class='fas fa-cctv facility'></i> security Cameras" name="facilities[]" > <i class="fas fa-cctv fontawesomeicon"></i><i class="fas fa-camera"></i> security Cameras
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting"  id="targetButton3">
                        <input type="checkbox" id="select_product" class="facility checkbox" data-target="targetButton3"
                        value="<i class='fa fa-wifi facility'></i> Wifi" name="facilities[]">
                        <i class="fas fa-wifi fontawesomeicon"></i>Wifi
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton4">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton4" value="<i class='fa fa-coffee facility'></i> Breakfast" name="facilities[]"><i class="fa fa-coffee fontawesomeicon"></i> Breakfast
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton5">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton5" value="<i class='fa fa-cutlery facility'></i> Lunch" name="facilities[]"><i class="fas fa-hamburger fontawesomeicon"></i>Lunch
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton6">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton6" value="<i class='fa fa-cutlery facility'></i> Dinner" name="facilities[]"><i class="fas fa-utensils fontawesomeicon"></i> Dinner
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton7">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton7" value="<i class='fa fa-fire facility'></i> Geyser" name="facilities[]"> 
                        <i class="fa fa-fire fontawesomeicon"></i> Geyser
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton8">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton8" value="<i class='fa fa-bath facility'></i> Attach Bath" name="facilities[]"> 
                        <i class="fa fa-bath fontawesomeicon" aria-hidden="true"></i> Attach Bath
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton9">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton9" value="<i class='fa fa-archive facility'></i> Cupboard" name="facilities[]">
                        <i class="fa fa-archive fontawesomeicon"></i> Cupboard
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton10">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton10" value="<i class='fa fa-car facility'></i> Parking" name="facilities[]">
                        <i class="fa fa-car fontawesomeicon"></i> Parking
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton11">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton11" value="<i class='fa fa-television facility'></i> TV" name="facilities[]"><i class="fas fa-tv fontawesomeicon"></i>TV
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton12">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton12" value="<i class='fa fa-internet-explorer facility'></i> Internet" name="facilities[]"><i class="fab fa-internet-explorer fontawesomeicon"></i>Internet
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton13">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton13" value="<i class='fa fa-signal facility'></i> Cable / Sattellite" name="facilities[]">
                        <i class="fa fa-signal fontawesomeicon"></i> Cable / Sattellite
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton14">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton14" value="<i class='fa fa-phone facility'></i> Telephone" name="facilities[]"> 
                        <i class="fa fa-phone fontawesomeicon"></i> Telephone
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton15">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton15" value="<i class='fa fa-male facility'></i> Security Gurads" name="facilities[]">
                        <i class="fa fa-male fontawesomeicon"></i> Security Gurads
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton16">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton16" value="<i class='fa fa-cutlery facility'></i> Kitchen" name="facilities[]">
                        <i class="fa fa-cutlery fontawesomeicon"></i> Kitchen
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton17">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton17" value="<i class='fa fa-loc facility'></i> Doorman" name="facilities[]">
                        <i class="fa fa-lock fontawesomeicon"></i> Door Lock
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton18">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton18" value="<i class='fa fa-fire-extinguisher facility'></i> Safety Fire" name="facilities[]"> 
                        <i class="fa fa-fire-extinguisher fontawesomeicon"></i> Safety Fire
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton19">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton19" value="<i class='fa fa-shower facility'></i> Washer" name="facilities[]"> 
                        <i class="fa fa-shower fontawesomeicon" aria-hidden="true"></i> Shower
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton20">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton20" value="<i class='fa fa-first-order facility'></i> Fridge" name="facilities[]"> 
                        <i class="fal fa-refrigerator fontawesomeicon"></i> Fridge
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton21">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton21" value="<i class='fa fa-archive facility'></i> Oven" name="facilities[]">
                        <i class="fa fa-archive fontawesomeicon" aria-hidden="true"></i> Oven
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton22">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton22" value="<i class='fa fa-star facility'></i> Air Cooler" name="facilities[]">
                        <i class="fa fa-star fontawesomeicon" aria-hidden="true"></i> Air Cooler
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton23">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton23" value="<i class='fa fa-building facility'></i> Roof Top" name="facilities[]">
                        <i class="fa fa-building fontawesomeicon"></i> Roof Top
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton24">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton24" value="<i class='fa fa-check facility'></i> Outdoor Sitting" name="facilities[]">
                        <i class="fa fa-check fontawesomeicon"></i> Outdoor Sitting
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton25">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton25" value="<i class='fa fa-shirtsinbulk facility'></i> Laundry" name="facilities[]">
                        <i class="fa fa-shirtsinbulk fontawesomeicon"></i> Laundry
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton26">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton26" value="<i class='fa fa-fire facility'></i> Heating" name="facilities[]">
                        <i class="fa fa-fire fontawesomeicon" aria-hidden="true"></i> Heating
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton27">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton27" value="<i class='fa fa-inbox facility'></i> Pool" name="facilities[]">
                        <i class="fa fa-inbox fontawesomeicon" aria-hidden="true"></i> Pool
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton28">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton28" value="<i class='fa fa-heartbeat facility'></i> Gym" name="facilities[]"> 
                        <i class="fa fa-heartbeat fontawesomeicon"></i> Gym
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton29">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton29" value="<i class='fa fa-ban facility'></i> Non Smoking" name="facilities[]">
                        <i class="fa fa-ban fontawesomeicon" aria-hidden="true"></i> Non Smoking
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 facilityDiv icon_setting" id="targetButton30">
                        <input type="checkbox" class="facility checkbox" data-target="targetButton30" value="<i class='fa fa-paw facility'></i> Pets Allowed" name="facilities[]">
                        <i class="fa fa-paw fontawesomeicon" aria-hidden="true"></i> Pets Allowed
                      </div>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-outline-primary float-right">
                </form>
         
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<script type="text/javascript">
         $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
    
      </script>
      <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
          $("#fileset").addClass("@error('filenames') is-invalid @enderror");

      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>
 <script type="text/javascript">
      $(".checkbox").change(function(){
  $("#"+$(this).data("target")).toggleClass("change-to-me");
});
   var a  = document.querySelector('.checkbox').value;
   console.warn(a);
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
<script type="text/javascript">
    var map;
    
    function initMap() {      
      var latitude = {{$data->h_latitude}}; // YOUR LATITUDE VALUE
      var longitude = {{$data->h_longitude}}; // YOUR LONGITUDE VALUE
      var myLatLng = {lat: latitude, lng: longitude};
      
      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14          
      });
          
      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        //title: 'Hello World'
        
        // setting latitude & longitude as title of the marker
        // title is shown when you hover over the marker
        title: latitude + ', ' + longitude 
      });     
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&callback=initMap"
    async defer></script>
    
@endsection

