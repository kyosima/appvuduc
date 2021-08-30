<x-header />

    <main id="main">
        <div id="content">
            <!-- Form đăng nhập -->
            <section class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="account-header row align-items-center">
                                <div class="col col-12 col-md-4 col-lg-4">
                                    <div class="profile-photo">
                                        <a href="" class="profile-photo-img">
                                            <span class="profile-photo-overlay"></span>
                                            <img src="https://orderus.vn/wp-content/plugins/ultimate-member/assets/img/default_avatar.jpg"
                                                alt="" class="profile-photo-avatar">
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-12 col-md-8 col-lg-8">
                                    <div class="profile-meta">
                                        <div class="profile-main-meta">
                                            <div class="meta-name">
                                                <h3>Vũ Quốc Minh</h3>
                                            </div>
                                            <div class="rank-custom d-flex align-items-center">
                                                <img src="https://orderus.vn/wp-content/uploads/2021/03/crowns.svg">
                                                <span>
                                                    <div class="mevivu-my-rank">PLATINUM</div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-edit"></div>
                            </div>

                            <div class="profile-nav mt-3">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-info" role="tab" aria-controls="pills-info"
                                            aria-selected="true"><i class="fas fa-user"></i> Thông tin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-info-tab" data-toggle="pill" href="#pills-history"
                                            role="tab" aria-controls="pills-history" aria-selected="false"><i
                                                class="fas fa-history"></i> Lịch sử đặt hàng</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-info" role="tabpanel"
                                        aria-labelledby="pills-info-tab">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="name">Họ và tên</label>
                                                <input type="name" class="form-control" id="name" placeholder="mevivu"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="mevivu@gmail.com" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Số điện thoại</label>
                                                <input type="name" class="form-control" id="name"
                                                    placeholder="0902 315 376" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mật khẩu</label>
                                                <input type="password" class="form-control" id="password" readonly>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Cập
                                                    nhật</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="pills-history" role="tabpanel"
                                        aria-labelledby="pills-history-tab">
                                        <div class="ajax-items">
                                            <div class="item">
                                                <div class="item-link">
                                                    <i class="fas fa-box"></i>
                                                    <a href="#">DONHANG-123</a>
                                                </div>
                                                <div class="item-meta">
                                                    <span>15-08-2020 11:00:00</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="item-link">
                                                    <i class="fas fa-box"></i>
                                                    <a href="#">DONHANG-123</a>
                                                </div>
                                                <div class="item-meta">
                                                    <span>15-08-2020 11:00:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

<x-footer />