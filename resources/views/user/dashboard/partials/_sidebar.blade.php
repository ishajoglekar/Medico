<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

          <li class="mt">
            <a  href="{{route('user.appointments.index')}}">
              <i class="fa fa-user"></i>
              <span>Medical Records</span>
              </a>
          </li>
          <li>
            <a class = "active" href="{{route('user.appointments.index')}}">
              <i class="fa fa-book"></i>
              <span>Appointments</span>
            </a>
          </li>
          <li>
            <a href="{{route('user.prescription')}}">
                <i class="fa fa-stethoscope" aria-hidden="true"></i>
                <span>Prescription</span>
            </a>
          </li>
          <li>
            <a  href="{{route('user.orders')}}">
                <i class="fa fa-medkit" aria-hidden="true"></i>
                <span>Orders</span>
            </a>
          </li>
          <!-- <li>
            <a  href="">
              <i class="fa fa-book"></i>
              <span>Online Consultations</span>
              </a>
          </li>
          <li>
            <a  href="">
              <i class="fa fa-book"></i>
              <span>Articles</span>
              </a>
          </li>
          <li>
            <a  href="">
              <i class="fa fa-thumbs-up"></i>
              <span>Feedback</span>
              </a>
          </li>
          <li>
            <a  href="">
                <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                <span>Payments</span>
            </a>
          </li> -->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
