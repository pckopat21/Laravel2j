@extends('layouts.admin')
@section('title', 'Personel Listesi')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Ünvanlar</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Ünvanlar</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">

                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModalekle"><i class="ri-add-line align-bottom me-1"></i> Ünvan Ekle</button>
                                        </div>

                                    </div>
                                </div>
                                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Ünvan</th>
                                        <th>Ünvan Yeri</th>
                                        <th>Ünvan Açıklaması</th>
                                        <th>İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                    <tr>
                                        <td width="20">1</td>
                                        <td>s ?></td>
                                        <td>s</td>
                                        <td>d</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center23">Sil</button>
                                            <div class="modal fade bs-example-modal-center23" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-5">
                                                            <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                                                            </lord-icon>
                                                            <form method="POST">
                                                                <input type="hidden" name="sil" value="2">
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">add </h4>
                                                                    <h4 class="text-muted mb-4"> Verisini Silmek İstediğinize Emin misiniz?</h4>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Vazgeç</button>
                                                                        <button type="submit" class="btn btn-danger">Evet, Veriyi Sil.</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <button type="button" title="Düzenle" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center-update32">Düzenle</button>
                                            <div id="myModal" class="modal fade bs-example-modal-center-update32" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content border-0">
                                                        <div class="modal-header bg-soft-info p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" id="id-field" />
                                                                <div class="row g-3">
                                                                    <div class="col-lg-12">
                                                                        <div class="text-center">
                                                                            <div class="position-relative d-inline-block">
                                                                                <div class="position-absolute bottom-0 end-0">
                                                                                    <label for="company-logo-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Resim Yükleyin">
                                                                                        <div class="avatar-xs cursor-pointer">
                                                                                            <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                                                <i class="ri-image-fill"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </label>
                                                                                    <input class="form-control d-none" value="" id="company-logo-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                                                </div>
                                                                                <div class="avatar-lg p-1">
                                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                                        <img src="assets/images/users/multi-user.jpg" id="companylogo-img" class="avatar-md rounded-circle object-cover" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="fs-13 mt-3">Resim</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div>
                                                                            <label for="companyname-field" class="form-label">Ünvan Adı</label>
                                                                            <input type="text" id="companyname-field" class="form-control" value="2" name="unvan_ad" required />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div>
                                                                            <label for="companyname-field" class="form-label">Ünvan Yeri</label>
                                                                            <input type="text" id="companyname-field" class="form-control" value="3" name="unvan_yer"  />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div>
                                                                            <label for="companyname-field" class="form-label">Ünvan Açıklama</label>
                                                                            <input type="text" id="companyname-field" class="form-control" value="4" name="unvan_aciklama"  />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Vazgeç</button>
                                                                    <button type="submit" class="btn btn-success ">Güncelle</button>
                                                                    <!--<button type="button" class="btn btn-success" id="edit-btn">Update</button>-->
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="unvan_id" value="1">
                                                            <input type="hidden" name="guncelle" value="1002">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="showModalekle" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0">
                            <div class="modal-header bg-soft-info p-3">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <input type="hidden" id="id-field" />
                                    <div class="row g-3">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <label for="company-logo-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Resim Yükleyin">
                                                            <div class="avatar-xs cursor-pointer">
                                                                <div class="avatar-title bg-light border rounded-circle text-muted">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value="" id="company-logo-input" type="file" accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg p-1">
                                                        <div class="avatar-title bg-light rounded-circle">
                                                            <img src="assets/images/users/multi-user.jpg" id="companylogo-img" class="avatar-md rounded-circle object-cover" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="fs-13 mt-3">Resim</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="companyname-field" class="form-label">Ünvan Ad</label>
                                                <input type="text" id="companyname-field" class="form-control" name="unvan_ad" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="companyname-field" class="form-label">Ünvan Yer</label>
                                                <input type="text" id="companyname-field" class="form-control" name="unvan_yer" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="companyname-field" class="form-label">Açıklama</label>
                                                <input type="text" id="companyname-field" class="form-control" name="unvan_aciklama" />
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
    <!-- end main content-->
@endsection
