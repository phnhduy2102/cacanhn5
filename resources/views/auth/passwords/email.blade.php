<!DOCTYPE html>
<html lang="en">

<head>
@include('backend.layouts.head')

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu?</h1>
                    <p class="mb-4">Không cần phải lo lắng. Chỉ cần nhập địa chỉ email của bạn và chúng tôi sẽ gửi một đường link thay đổi mật khẩu cho bạn.</p>
                  </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form class="user"  method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Thay đổi mật khẩu
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('login')}}">Đã có tài khoản? Đăng nhập thôi!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>
