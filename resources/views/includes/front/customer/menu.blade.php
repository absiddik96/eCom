<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Customer section</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href=""><i class="fa fa-user"></i> My account</a>
            </li>
            <li>
                <a href=""><i class="fa fa-list"></i> My orders</a>
            </li>
            <li>
                <a href=""><i class="fa fa-heart"></i> My wishlist</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>

</div>