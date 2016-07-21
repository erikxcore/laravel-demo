
<header class="mcc-header mcc-header-slim" role="contentinfo">
<div class="mcc-header-primary-section">
      <div class="mcc-grid-full">
        <div class="mcc-header-logo mcc-width-one-third">
          <h4>Laravel Demo</h4>
        </div>
        <nav class="mcc-header-nav mcc-width-two-thirds">
          <ul class="mcc-unstyled-list">
            <li class="mcc-width-one-sixth mcc-header-primary-content">
              <a class="mcc-header-primary-link" href="/">Home</a>
            </li>
            <li class="mcc-width-one-sixth mcc-header-primary-content">
              <a class="mcc-header-primary-link" href="/posts">Posts</a>
            </li>
            <!--
            <li class="mcc-width-one-sixth mcc-header-primary-content">
              <a class="mcc-header-primary-link" href="/auth/register">Register</a>
            </li>
            -->
            <!--
            <li class="mcc-width-one-sixth mcc-header-primary-content">
              <a class="mcc-header-primary-link" href="/auth/login">Login</a>
            </li>
            -->
            <li class="mcc-width-one-sixth mcc-header-primary-content">
              <a class="mcc-header-primary-link" href="{{url('/auth/logout')}}">Logout</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
</header>