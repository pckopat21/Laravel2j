@extends('layouts.admin')
@section('title', 'Kullanici Listesi')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Kullanıcılar</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin_home')}}">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Kullanici</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Kullanıcı Listesi</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                                    id="create-btn" data-bs-target="#showModalekle"><i
                                                    class="ri-add-line align-bottom me-1"></i>Kullanıcı Ekle
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
                                        <th>Yetki</th>
                                        <th>durum</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($users) > 0)
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <button type="button" title="Düzenle" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-update{{$user->id}}">Düzenle</button>
                                                    </div>
                                                    <div id="myModal" class="modal fade bs-example-modal-center-update{{$user->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content border-0">
                                                                <div class="modal-header bg-soft-info p-3">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                                            id="close-modal"></button>
                                                                </div>
                                                                <form method="POST" action="{{route('admin_kullanici_update',['id'=>$user->id])}}" enctype="multipart/form-data">
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
                                                                                           name="name"  value="{{$user->name}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Mail</label>
                                                                                    <input type="text" id="companyname-field" class="form-control"
                                                                                           name="email" value="{{$user->email}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="companyname-field" class="form-label">Şifre</label>
                                                                                    <input type="text" id="companyname-field" class="form-control"
                                                                                           name="password" value="{{$user->password}}" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div>
                                                                                    <label for="owner-field" class="form-label">Photo</label>
                                                                                    <input type="text" id="owner-field" class="form-control"
                                                                                           name="profile_photo_path" value="{{$user->profile_photo_path}}" required/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-12">
                                                                                <div>
                                                                                    <label for="since-field" class="form-label">Açıklama</label>
                                                                                    <input type="text" id="since-field" class="form-control"
                                                                                           name="personel_aciklama" value="{{$user->email}}"/>
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
                                    @else
                                        <tr colspan ="5">
                                            <td><p class="text-center">Herhangi Bir Veri Bulunamadı</p></td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- end main content-->
            <div id="showModalekle" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header bg-soft-info p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-modal"></button>
                        </div>
                        <form method="POST" action="{{route('admin_kullanici_create')}}" enctype="multipart/form-data">
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
                                                   name="name" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="companyname-field" class="form-label">TC</label>
                                            <input type="number" id="companyname-field" class="form-control"
                                                   name="email" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div>
                                            <label for="companyname-field" class="form-label">Sicil</label>
                                            <input type="text" id="companyname-field" class="form-control"
                                                   name="password" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="since-field" class="form-label">Açıklama</label>
                                            <input type="text" id="since-field" class="form-control"
                                                   name="profile_photo_path"/>
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
@endsection






