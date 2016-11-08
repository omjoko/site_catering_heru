      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li class="sub-menu">
                      <a href="javascript:;" class="{{ Request::is('user', 'recipes', 'ingredients', 'categorys', 'measurements', 'menus', 'vendors', 'kapal', 'penyimpanan', 'pelabuhan', 'rute') ? 'active' : '' }}">
                          <i class="fa fa-list"></i>
                          <span>Master Data</span>
                      </a>
                       <ul class="sub">
                          <li class="{{ Request::is('user') ? 'active' : '' }}"><a href="user">User</a></li>
                          <li>
                              <a href="javascript:;" class="{{ Request::is('ingredients', 'categorys', 'measurements') ? 'active' : '' }}">Ingredient</a>
                              <ul class="sub">
                                  <li class="{{ Request::is('ingredients') ? 'active' : '' }}"><a  href="ingredients">Ingredient Table</a></li>
                                  <li class="{{ Request::is('categorys') ? 'active' : '' }}"><a  href="categorys">Kategori Ingredient</a></li>
                                  <li class="{{ Request::is('measurements') ? 'active' : '' }}"><a  href="measurements">Satuan Ingredient</a></li>
                              </ul>
                          </li>
                          <li class="{{ Request::is('recipes') ? 'active' : '' }}"><a href="recipes">Recipe</a></li>
                          <li class="{{ Request::is('menus') ? 'active' : '' }}"><a href="menus">Menu</a></li>
                          <li class="{{ Request::is('vendors') ? 'active' : '' }}"><a href="vendors">Vendor</a></li>
                          <li class="{{ Request::is('kapal') ? 'active' : '' }}"><a href="kapal">Kapal</a></li>
                          <li class="{{ Request::is('pelabuhan') ? 'active' : '' }}"><a href="pelabuhan">Pelabuhan</a></li>
                          <li class="{{ Request::is('rute') ? 'active' : '' }}"><a href="rute">Rute</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="/">
                          <i class="fa fa-paper-plane"></i>
                          <span>Voyage Planning</span>
                      </a>
                  </li> 
                  <li class="{{ Request::is('food-plannings') ? 'active' : '' }}">
                      <a href="food-plannings">
                          <i class="fa fa-spoon"></i>
                          <span>Food Planning</span>
                      </a>
                  </li>                  
                  <li>
                      <a href="/">
                          <i class="fa fa-cube"></i>
                          <span>Draft PO / Requisition</span>
                      </a>
                  </li>
                  <li class="{{ Request::is('invoices') ? 'active' : '' }}">
                      <a href="invoices">
                          <i class="fa fa-file-text"></i>
                          <span>Invoice</span>
                      </a>
                  </li>                  
                  <li>
                      <a href="/">
                          <i class="fa fa-sign-out"></i>
                          <span>Inventory Out</span>
                      </a>
                  </li>
                  <li>
                      <a href="waste" class="{{ Request::is('waste') ? 'active' : '' }}">
                          <i class="fa fa-leaf"></i>
                          <span>Waste</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->