<li style="margin: 7px 20px 0 0;">
    <form id="logout-form" class="form-horizontal" action="{{ route('logout') }}" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-info">
            <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
        </button>
    </form>
</li>