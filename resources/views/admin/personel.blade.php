@extends('layouts.admin')
@section('title', 'Personel Listesi')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Personeller</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin_home')}}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Personel</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Personel Listesi</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                                    id="create-btn" data-bs-target="#showModalekle"><i
                                                    class="ri-add-line align-bottom me-1"></i>Personel Ekle
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <table id="model-datatables"
                                       class="table table-bordered nowrap table-striped align-middle"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th>Ad Soyad</th>
                                        <th>TC Kimlik</th>
                                        <th>Sicil</th>
                                        <th>Statü</th>
                                        <th>Ünvan</th>
                                        <th>İşe Giriş Tarih</th>
                                        <th>Mezuniyet</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $value)
                                        <tr>
                                            <td>{{$value->personel_id}}</td>
                                            <td>{{$value->personel_adsoyad}}</td>
                                            <td>{{$value->personel_tc}}</td>
                                            <td>{{$value->personel_sicilno}}</td>
                                            <td>{{$value->unvan_id}}</td>
                                            <td>{{$value->personel_unvan}}</td>
                                            <td>{{date("d-m-Y", strtotime($value->personel_isegiristarih))}}</td>
                                            <td>{{$value->personel_ogrenim}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <button type="button" title="Düzenle" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-update{{$value->personel_id}}">Düzenle</button>
                                                    </div>
                                                    <div id="myModal" class="modal fade bs-example-modal-center-update{{$value->personel_id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content border-0">
                                                                <div class="modal-header bg-soft-info p-3">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                                            id="close-modal"></button>
                                                                </div>
                                                                <form method="POST" action="{{route('admin_personel_update',['id'=>$value->personel_id])}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="id-field"/>
                                                                        <div class="row g-3">
                                                                            <div class="col-lg-12">
                                                                                <div class="text-center">
                                                                                    <div class="position-relative d-inline-block">
                                                                                        <div class="position-absolute bottom-0 end-0">
                                                                                            <label for="company-logo-input" class="mb-0"
                                                                                                   data-bs-toggle="tooltip" data-bs-placement="right"
                                                                                                   title="Resim Yükleyin">
                                                                                                <div class="avatar-xs cursor-pointer">
                                                                                                    <div
                                                                                                        class="avatar-title bg-light border rounded-circle text-muted">
                                                                                                        <i class="ri-image-fill"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </label>
                                                                                            <input class="form-control d-none" name="images" value=""
                                                                                                   id="company-logo-input" type="file"
                                                                                                   accept="image/png, image/gif, image/jpeg">
                                                                                        </div>
                                                                                        <div class="avatar-lg p-1">
                                                                                            <div class="avatar-title bg-light rounded-circle">
                                                                                                <img src="{{asset('assets')}}/admin/images/users/multi-user.jpg"
                                                                                                     id="companylogo-img"
                                                                                                     class="avatar-md rounded-circle object-cover"/>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <h5 class="fs-13 mt-3">Resim</h5>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Ad Soyad</label>
                                                                                    <input type="text" id="companyname-field" class="form-control"
                                                                                           name="personel_adsoyad"  value="{{$value->personel_adsoyad}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">TC</label>
                                                                                    <input type="number" id="companyname-field" class="form-control"
                                                                                           name="personel_tc" value="{{$value->personel_tc}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Sicil</label>
                                                                                    <input type="text" id="companyname-field" class="form-control"
                                                                                           name="personel_sicilno" value="{{$value->personel_sicilno}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="owner-field" class="form-label">Telefon</label>
                                                                                    <input type="number" id="owner-field" class="form-control"
                                                                                           name="personel_telefon" value="{{$value->personel_telefon}}" required/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Statü</label>
                                                                                    <select class="form-select" id="industry_type-field" name="unvan_id"
                                                                                            required>
                                                                                        <option value="" selected="selected">Seçim Yapınız</option>
                                                                                        @foreach($datalist as $value)
                                                                                            <option value="{{$value->unvan_id}}" @if ($value->unvan_id) selected="selected" @endif >{{$value->unvan_id}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Kadro</label>

                                                                                    <select class="form-select" id="industry_type-field" name="personel_gorev"
                                                                                            required>
                                                                                        <option selected value="">Seçim Yapınız</option>

                                                                                        @foreach($datalist as $value)
                                                                                            <option value="{{$value->personel_gorev}}">{{$value->personel_gorev}}</option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Ünvan</label>

                                                                                    <select class="form-select" id="industry_type-field" name="personel_unvan"
                                                                                            required>
                                                                                        <option selected value="">Seçim Yapınız</option>
                                                                                        @foreach($datalist as $value)
                                                                                            <option value="{{$value->personel_unvan}}">{{$value->personel_unvan}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Görev Yeri</label>

                                                                                    <select class="form-select" id="industry_type-field"
                                                                                            name="personel_gorevyeri" required>
                                                                                        <option selected value="">Seçim Yapınız</option>
                                                                                        @foreach($datalist as $value)
                                                                                            <option value="{{$value->personel_gorevyeri}}">{{$value->personel_gorevyeri}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="star_value-field" class="form-label">Doğum Tarihi</label>
                                                                                    <input type="date" id="star_value-field" class="form-control"
                                                                                           name="personel_dogumtarihi"  value="{{$value->personel_dogumtarihi}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="location-field" class="form-label">İşe Giriş Tarihi</label>
                                                                                    <input type="date" id="location-field" class="form-control"
                                                                                           name="personel_isegiristarih" value="{{$value->personel_isegiristarih}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="employee-field" class="form-label">E Posta</label>
                                                                                    <input type="email" id="employee-field" class="form-control"
                                                                                           name="personel_eposta" value="{{$value->personel_eposta}}"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="website-field" class="form-label">Sıra</label>
                                                                                    <input type="number" id="website-field" class="form-control"
                                                                                           name="personel_siralama" value="{{$value->personel_siralama}}"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label>İl</label>

                                                                                    <select class="select2_multiple form-control" id="il_select_form"
                                                                                            name="personel_il" required>
                                                                                        <option selected value="">Seçim Yapınız</option>

                                                                                        <option
                                                                                            value=""></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label>İlçe</label>

                                                                                    <select class="select2_multiple form-control" id="ilce_select_form"
                                                                                            name="personel_ilce" required>
                                                                                        <option selected value="">Seçim Yapınız</option>

                                                                                        <option il_id=""
                                                                                                value=""></option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-1">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Derece</label>
                                                                                    <input type="number" id="companyname-field" class="form-control"
                                                                                           name="personel_derece" value="{{$value->personel_derece}}"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-1">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Kademe</label>
                                                                                    <input type="number" id="companyname-field" class="form-control"
                                                                                           name="personel_kademe" value="{{$value->personel_kademe}}"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-1">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">e</label>
                                                                                    <input type="number" id="companyname-field" class="form-control"
                                                                                           name="personel_kademe" value="{{$value->personel_kademe}}"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Engelli mi? </label>
                                                                                    <select class="form-select" id="industry_type-field"
                                                                                            name="personel_engellimi" required>

                                                                                        <option selected="{{$value->personel_engellimi}}"></option>


                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Kan Grubu </label>
                                                                                    <select class="form-select" id="industry_type-field" name="personel_kan"
                                                                                            required>
                                                                                        <option selected value="">Seçim Yapınız</option>
                                                                                        <option>A Rh (+)</option>
                                                                                        <option>B Rh (+)</option>
                                                                                        <option>AB Rh (+)</option>
                                                                                        <option>O Rh (+)</option>
                                                                                        <option>A Rh (-)</option>
                                                                                        <option>B Rh (-)</option>
                                                                                        <option>AB Rh (-)</option>
                                                                                        <option>O Rh (-)</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="industry_type-field" class="form-label">Öğrenim</label>

                                                                                    <select class="form-select" id="industry_type-field" name="personel_ogrenim"
                                                                                            required>
                                                                                        <option selected value="">Seçim Yapınız</option>

                                                                                        @foreach($datalist as $value)
                                                                                            <option value="{{$value->unvan_id}}">{{$value->unvan_id}}</option>
                                                                                        @endforeach

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <div>
                                                                                    <label for="since-field" class="form-label">Okul</label>
                                                                                    <input type="text"  class="form-control"
                                                                                           name="personel_okul" value="{{$value->personel_okul}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div>
                                                                                    <label for="since-field" class="form-label">Adres</label>
                                                                                    <input type="text" id="since-field" class="form-control"
                                                                                           name="personel_adres" value="{{$value->personel_adres}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div>
                                                                                    <label for="since-field" class="form-label">Açıklama</label>
                                                                                    <input type="text" id="since-field" class="form-control"
                                                                                           name="personel_aciklama" value="{{$value->personel_aciklama}}"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Vazgeç</button>
                                                                            <button type="submit" class="btn btn-success" id="add-btn">Kaydet</button>
                                                                            <!--<button type="button" class="btn btn-success" id="edit-btn">Update</button>-->
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="kaydet" value="1001">
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="showModalekle" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-soft-info p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                        </div>
                        <form method="POST" action="{{route('admin_personel_create')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="id-field"/>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <div class="position-relative d-inline-block">
                                                <div class="position-absolute bottom-0 end-0">
                                                    <label for="company-logo-input" class="mb-0"
                                                           data-bs-toggle="tooltip" data-bs-placement="right"
                                                           title="Resim Yükleyin">
                                                        <div class="avatar-xs cursor-pointer">
                                                            <div
                                                                class="avatar-title bg-light border rounded-circle text-muted">
                                                                <i class="ri-image-fill"></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <input class="form-control d-none" name="images" value=""
                                                           id="company-logo-input" type="file"
                                                           accept="image/png, image/gif, image/jpeg">
                                                </div>
                                                <div class="avatar-lg p-1">
                                                    <div class="avatar-title bg-light rounded-circle">
                                                        <img src="{{asset('assets')}}/admin/images/users/multi-user.jpg"
                                                             id="companylogo-img"
                                                             class="avatar-md rounded-circle object-cover"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="fs-13 mt-3">Resim</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="companyname-field" class="form-label">Ad Soyad</label>
                                            <input type="text" id="companyname-field" class="form-control"
                                                   name="personel_adsoyad" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="companyname-field" class="form-label">TC</label>
                                            <input type="number" id="companyname-field" class="form-control"
                                                   name="personel_tc" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="companyname-field" class="form-label">Sicil</label>
                                            <input type="text" id="companyname-field" class="form-control"
                                                   name="personel_sicilno" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="owner-field" class="form-label">Telefon</label>
                                            <input type="number" id="owner-field" class="form-control"
                                                   name="personel_telefon" placeholder="0 Olmadan Girin!" required/>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Statü</label>
                                            <select class="form-select" id="industry_type-field" name="unvan_id"
                                                    required>
                                                <option value="" selected="selected">Seçim Yapınız</option>
                                                @foreach($datalist as $value)
                                                    <option value="{{$value->unvan_id}}">{{$value->unvan_id}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Kadro</label>

                                            <select class="form-select" id="industry_type-field" name="personel_gorev"
                                                    required>
                                                <option selected value="">Seçim Yapınız</option>

                                                @foreach($datalist as $value)
                                                    <option value="{{$value->personel_gorev}}">{{$value->personel_gorev}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Ünvan</label>

                                            <select class="form-select" id="industry_type-field" name="personel_unvan"
                                                    required>
                                                <option selected value="">Seçim Yapınız</option>
                                                @foreach($datalist as $value)
                                                    <option value="{{$value->personel_unvan}}">{{$value->personel_unvan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Görev Yeri</label>

                                            <select class="form-select" id="industry_type-field"
                                                    name="personel_gorevyeri" required>
                                                <option selected value="">Seçim Yapınız</option>
                                                @foreach($datalist as $value)
                                                    <option value="{{$value->personel_gorevyeri}}">{{$value->personel_gorevyeri}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="star_value-field" class="form-label">Doğum Tarihi</label>
                                            <input type="date" id="star_value-field" class="form-control"
                                                   name="personel_dogumtarihi" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="location-field" class="form-label">İşe Giriş Tarihi</label>
                                            <input type="date" id="location-field" class="form-control"
                                                   name="personel_isegiristarih" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="employee-field" class="form-label">E Posta</label>
                                            <input type="email" id="employee-field" class="form-control"
                                                   name="personel_eposta"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="website-field" class="form-label">Sıra</label>
                                            <input type="number" id="website-field" class="form-control"
                                                   name="personel_siralama"/>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label>İl</label>

                                            <select class="select2_multiple form-control" id="il_select_form"
                                                    name="personel_il" required>
                                                <option selected value="">Seçim Yapınız</option>

                                                <option
                                                    value=""></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div>
                                            <label>İlçe</label>

                                            <select class="select2_multiple form-control" id="ilce_select_form"
                                                    name="personel_ilce" required>
                                                <option selected value="">Seçim Yapınız</option>

                                                <option il_id=""
                                                        value=""></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-1">
                                        <div>
                                            <label for="companyname-field" class="form-label">Derece</label>
                                            <input type="number" id="companyname-field" class="form-control"
                                                   name="personel_derece"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div>
                                            <label for="companyname-field" class="form-label">Kademe</label>
                                            <input type="number" id="companyname-field" class="form-control"
                                                   name="personel_kademe"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Sözleşmeli mi? </label>
                                            <select class="form-select" id="industry_type-field"
                                                    name="personel_sozlesmelimi" required>
                                                <option selected value="">Seçim Yapınız</option>
                                                <option value="1">Evet</option>
                                                <option value="0">Hayır</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Engelli mi? </label>
                                            <select class="form-select" id="industry_type-field"
                                                    name="personel_engellimi" required>
                                                <option selected value="">Seçim Yapınız</option>
                                                <option value="1">Evet</option>
                                                <option value="0">Hayır</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Kan Grubu </label>
                                            <select class="form-select" id="industry_type-field" name="personel_kan"
                                                    required>
                                                <option selected value="">Seçim Yapınız</option>
                                                <option>A Rh (+)</option>
                                                <option>B Rh (+)</option>
                                                <option>AB Rh (+)</option>
                                                <option>O Rh (+)</option>
                                                <option>A Rh (-)</option>
                                                <option>B Rh (-)</option>
                                                <option>AB Rh (-)</option>
                                                <option>O Rh (-)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="industry_type-field" class="form-label">Öğrenim</label>

                                            <select class="form-select" id="industry_type-field" name="personel_ogrenim"
                                                    required>
                                                <option selected value="">Seçim Yapınız</option>

                                                @foreach($datalist as $value)
                                                    <option value="{{$value->unvan_id}}">{{$value->unvan_id}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="companyname-field" class="form-label">Okul Bilgisi</label>
                                            <input type="text" id="companyname-field" class="form-control"
                                                   name="personel_okul"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="since-field" class="form-label">Adres</label>
                                            <input type="text" id="since-field" class="form-control"
                                                   name="personel_adres" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="since-field" class="form-label">Açıklama</label>
                                            <input type="text" id="since-field" class="form-control"
                                                   name="personel_aciklama"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Vazgeç</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Kaydet</button>
                                    <!--<button type="button" class="btn btn-success" id="edit-btn">Update</button>-->
                                </div>
                            </div>
                            <input type="hidden" name="kaydet" value="1001">
                        </form>
                    </div>
                </div>
            </div>
            <!-- end main content-->
@endsection






