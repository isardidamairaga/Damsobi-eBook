            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp active">
                        menu
                    </span>
                </button>
                <div class="theme-togler">
                    <span class="material-symbols-sharp active">
                        light_mode
                    </span>
                    <span class="material-symbols-sharp">
                        dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>{{ auth()->user()->name }}</b><br>
                            <small class="text-muted">
                                @if (auth()->user()->isAadmin = true)
                                    Admin
                                @endif
                            </small>
                        </p>
                    </div>
                    <div class="profile-photo">
                        <img src="{{ asset('images/3135715.png') }}" alt="">
                    </div>
                </div>
            </div>
