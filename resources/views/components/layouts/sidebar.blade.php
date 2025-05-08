  <!--**********************************
            Sidebar start
        ***********************************-->
  <div class="quixnav">
      <div class="quixnav-scroll">
          <ul class="metismenu" id="menu">
              <li class="nav-label first text-white">Main Menu</li>
              <li><a class="has-arrow" href="{{ route('pages.dashboard') }}" aria-expanded="false"><i
                          class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
              </li>
              <li class="nav-label text-white">Apps</li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                          class="icon icon-app-store"></i><span class="nav-text">Office Management</span></a>
                  <ul aria-expanded="false">
                      <li><a href="{{ route('pages.dutyreport.index') }}">တာဝန်မှူးအစီရင်ခံစာ</a></li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">အမှုတွဲဖိုင်များ</a>
                          <ul aria-expanded="false">
                              <li><a href="{{ route('caseFile.index') }}">ဖိုင်အမည်များ</a></li>
                              <li><a href="{{ route('caseList.index') }}">အမှုတွဲများ</a></li>
                          </ul>
                      </li>
                      <li><a class="has-arrow" href="{{ route('department.index') }}" aria-expanded="false">ဌာနများ</a>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">ကိုယ်ရေးအချက်အလက်</a>
                          <ul aria-expanded="false">
                              <li><a href="{{ route('personnel.index') }}">ကိုယ်ရေးအချက် ၁၈ ချက်</a></li>
                              <li><a href="">ကိုယ်ရေးအချက် ၅၃ ချက်</a></li>
                          </ul>
                      </li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">ဌာနပိုင်စက်ပစ္စည်းများ</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('inventoryCat.index') }}">စက်ပစ္စည်းအမျိုးအစားများ</a></li>
                            <li><a href="{{ route('inventory.index') }}">စက်ပစ္စည်းစာရင်း</a></li>
                        </ul>
                    </li>
                  </ul>
              </li>

              <li class="nav-label text-white">Users</li>
              <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                          class="icon icon-layout-25"></i><span class="nav-text">Users Management</span></a>
                  <ul aria-expanded="false">
                      <li><a href="{{ route('users.create') }}">Create New Users</a></li>
                      <li><a href="{{ route('users.index') }}">Manage Users</a></li>
                      <!-- <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="./app-calender.html">Calendar</a></li> -->
                  </ul>
              </li>
              </li>
          </ul>
      </div>


  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->
