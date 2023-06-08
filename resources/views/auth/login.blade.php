<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Accueil</a>
                    <span></span> Se connecter
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Se connecter</h3>
                                        </div>
                                        <form method="post" action="{{route('login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Votre Email" :value="old('email')" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
                                            </div>
                                            <div class="form-group float-end">
                                                <a class="text-muted" href="{{route('password.request')}}">Mot de passe oublié ?</a>
                                            </div>
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Se connecter</button>
                                            </div>
                                        </form>
                                        <div class="text-muted text-center">Vous avez n'aves pas de compte ? <a href="{{route('register')}}">Enregistrez-vous</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                                <img src="assets/imgs/login.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
