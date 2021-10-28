<!-- 👇 Sub-Navigation-(toolbar) -->
<div class="bg-contrast-lower js-hide-nav js-hide-nav--sub hide-nav z-index-2">
    <div class="container max-width-lg">
        <div class="subnav  js-subnav">
            <button class="reset btn btn--subtle margin-y-sm subnav__control js-subnav__control">
                <span>Show Categories</span>
                <svg class="icon icon--xxs margin-left-xxs" aria-hidden="true" viewBox="0 0 12 12">
                    <polyline points="0.5 3.5 6 9.5 11.5 3.5" fill="none" stroke-width="1" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round"></polyline>
                </svg>
            </button>

            <div class="subnav__wrapper js-subnav__wrapper">
                <nav class="subnav__nav justify-left">
                    <button class="reset subnav__close-btn js-subnav__close-btn js-tab-focus"
                        aria-label="Close navigation">
                        <svg class="icon" viewBox="0 0 16 16">
                            <g stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10">
                                <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                            </g>
                        </svg>
                    </button>

                    <menu class="menu-bar menu-bar--expanded@md js-menu-bar width-100%">

                        <li class="menu-bar__item has-text modal-trigger-add-blog" aria-controls="modal-add-blog" role="menuitem" data-href="{{ url('admin/blog/add') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                                <title>pencil</title>
                                <rect data-element="frame" x="9.600000000000001" y="9.600000000000001"
                                    width="28.799999999999997" height="28.799999999999997" rx="6" ry="6" stroke="none"
                                    fill="#0d9eec"></rect>
                                <g transform="translate(14.399999999999999 14.399999999999999) scale(0.4)"
                                    fill="#ffffff">
                                    <path fill="#ffffff"
                                        d="M43.7,8.6l-4.3-4.3c-0.9-0.9-2.2-1.5-3.5-1.5c-1.3,0-2.6,0.5-3.5,1.5L5.1,31.5C5,31.6,5,31.7,4.9,31.8 c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1l-2,12c-0.1,0.3,0.1,0.6,0.3,0.9c0.2,0.2,0.4,0.3,0.7,0.3c0.1,0,0.1,0,0.2,0l12-2c0,0,0.1,0,0.1,0 c0,0,0.1,0,0.1,0c0.1,0,0.2-0.1,0.3-0.2l27.2-27.2C45.7,13.8,45.7,10.6,43.7,8.6z M9.3,42.2l-3.6-3.6l0.7-4.4l7.3,7.3L9.3,42.2z M30.7,18.7L14.4,35c-0.2,0.2-0.5,0.3-0.7,0.3c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l16.3-16.3c0.4-0.4,1-0.4,1.4,0 S31.1,18.3,30.7,18.7z M37.8,18.8l-8.6-8.6l2.6-2.6l8.6,8.6L37.8,18.8z">
                                    </path>
                                </g>
                            </svg>
                            <span class="menu-bar__text display@md">Add Blog</span>
                            <span class="menu-bar__label">Add</span>
                        </li>

                        <li class="menu-bar__item" role="menuitem" data-control-form="#form-bulk-suspend">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <title>single-folded-content</title>
                                <g fill="#bfbfbf">
                                    <path fill="#bfbfbf"
                                        d="M15,0H2C1.448,0,1,0.448,1,1v22c0,0.552,0.448,1,1,1h20c0.552,0,1-0.448,1-1V8h-7c-0.552,0-1-0.448-1-1V0z M5,17h14v2H5V17z M5,12h14v2H5V12z M11,9H5V7h6V9z">
                                    </path>
                                    <polygon points="22.414,6 17,6 17,0.586 "></polygon>
                                </g>
                            </svg>
                            <span class="counter counter--critical counter--docked"><span class="table-total-selected">0</span><!-- /.table-total-selected --> <i
                                    class="sr-only">Notifications</i></span>
                            <span class="menu-bar__label">Suspend</span>
                        </li>

                        <li class="menu-bar__item" role="menuitem" data-control-form="#form-bulk-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <title>trash-simple</title>
                                <g fill="#bfbfbf">
                                    <path fill="#bfbfbf"
                                        d="M3,8v15c0,0.552,0.448,1,1,1h16c0.552,0,1-0.448,1-1V8H3z M9,19H7v-6h2V19z M13,19h-2v-6h2V19z M17,19h-2v-6 h2V19z">
                                    </path>
                                    <path
                                        d="M23,4h-6V1c0-0.552-0.447-1-1-1H8C7.447,0,7,0.448,7,1v3H1C0.447,4,0,4.448,0,5s0.447,1,1,1 h22c0.553,0,1-0.448,1-1S23.553,4,23,4z M9,2h6v2H9V2z">
                                    </path>
                                </g>
                            </svg>
                            <span class="counter counter--critical counter--docked"><span class="table-total-selected">0</span><!-- /.table-total-selected --> <i
                                    class="sr-only">Notifications</i></span>
                            <span class="menu-bar__label">Delete</span>
                        </li>

                        <li class="menu-bar__item" style="margin-left: auto; margin-right: 40px;">
                            <form action="{{ url('admin/blog') }}" method="GET" style="margin-top: -20px;">
                                <input type="hidden" name="q" value="{{$q}}">
                                <input type="hidden" name="sort" value="{{$sort}}">
                                <input type="hidden" name="order" value="{{$order}}">

                                <label class="form-label" for="site-table-limit"></label>

                                <div class="select inline-block js-select" data-trigger-class="btn btn--subtle padding-sm@md padding-xs">
                                <select name="limit" id="site-table-limit">
                                    <optgroup label="Amount to show">
                                    @foreach($availableLimit as $amount)
                                        <option value="{{$amount}}" @if($limit == $amount) selected @endif>Show {{$amount}}</option>
                                    @endforeach
                                    </optgroup>
                                </select>

                                <svg class="icon icon--xs margin-left-xxxs" aria-hidden="true" viewBox="0 0 16 16"><polygon points="3,5 8,11 13,5 "></polygon></svg>
                                </div><!-- /.js-select -->
                            </form>
                        </li><!-- /.menu-bar__item -->

                        <li class="menu-bar__item hide@md no-js:is-hidden" aria-controls="sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="#bfbfbf">
                                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                </g>
                            </svg>
                            <span class="menu-bar__label">Sidebar</span>
                            </g>
                            </svg>
                        </li>
                    </menu>
                </nav>
            </div><!-- /.subnav_wrapper -->
        </div>
    </div>
</div>
<!-- 👇 Sub-Navigation-(toolbar) end-->