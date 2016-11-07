      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li class="sub-menu">
                      <a href="javascript:;" class="{{ Request::is('user', 'recipes', 'ingredients') ? 'active' : '' }}">
                          <i class="fa fa-list"></i>
                          <span>Master Data</span>
                      </a>
                       <ul class="sub">
                          <li class="{{ Request::is('user') ? 'active' : '' }}"><a href="user">User</a></li>
                          <li>
                              <a href="javascript:;">Ingredient</a>
                              <ul class="sub">
                                  <li><a  href="ingredients">Ingredient Table</a></li>
                                  <li><a  href="categorys">Kategori Ingredient</a></li>
                                  <li><a  href="measurements">Satuan Ingredient</a></li>
                              </ul>
                          </li>
                          <li class="{{ Request::is('recipes') ? 'active' : '' }}"><a href="recipes">Recipe</a></li>
                          <li><a href="menus">Menu</a></li>
                          <li><a href="vendors">Vendor</a></li>
                          <li>
                              <a href="javascript:;">Kapal</a>
                              <ul class="sub">
                                  <li><a  href="kapal">Kapal</a></li>
                                  <li><a  href="penyimpanan">Penyimpanan</a></li>
                              </ul>
                          </li>
                          <li><a href="pelabuhan">Pelabuhan</a></li>
                          <li><a href="rute">Rute</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="/">
                          <i class="fa fa-paper-plane"></i>
                          <span>Voyage Planning</span>
                      </a>
                  </li>                  
                  <li>
                      <a href="/">
                          <i class="fa fa-cube"></i>
                          <span>Draft PO / Requisition</span>
                      </a>
                  </li>                  
                  <li>
                      <a href="/">
                          <i class="fa fa-sign-out"></i>
                          <span>Inventory Out</span>
                      </a>
                  </li>
                  <li>
                      <a href="/">
                          <i class="fa fa-spoon"></i>
                          <span>Waste</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->