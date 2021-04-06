<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="mt">
            <a class="{{ $section =='profile' ? 'active' : ''}}" href="{{route('doctor.dashboard')}}">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
          </li>
          <li>
            <a  class="{{ $section =='appointment' ? 'active' : ''}}" href="{{route('appointments.index')}}">
              <i class="fa fa-book"></i>
              <span>Appointments</span>
              </a>
          </li>
          <li>
              <a  class="{{ $section =='slot' ? 'active' : ''}}" href="{{route('slots.index')}}">
              <i class="fa fa-calendar"></i>
              <span>Slots</span>
              </a>
          </li>
          <li>
            <a  class="{{ $section =='feedback' ? 'active' : ''}}" href="{{route('feedbacks.index')}}">
              <i class="fa fa-thumbs-up"></i>
              <span>Feedback</span>
              </a>
          </li>
         

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
