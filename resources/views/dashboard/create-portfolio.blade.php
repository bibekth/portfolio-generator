@extends('dashboard.layouts.main')

@section('admin-content')
@viteReactRefresh
@vite(['resources/sass/app.scss', 'resources/js/app.jsx'])

<div class="edit-website-container">
    <div class="row">
        <div class="col-2 bg-secondary pt-3" style="height: 90vh">
            <div class="add-element">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add
                    Page</button>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('dashboard.portfolio-section.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="portfolio_id" id="portfolio_id" value="{{ $portfolio->id }}">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Page Title?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="title" id="title" placeholder="Enter the page title."
                                    class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="btn-title-save" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(count($portfolio->portfolio_section)>0)
            <div class="sections-left-content my-3">
                <ul id="sortable-section-list" class="list-group">
                    @foreach($portfolio->portfolio_section as $key => $section)
                    <li class="list-group-item ui-state-default"><span class="d-flex justify-content-between"><span
                                class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $section->title }} <span><a
                                    href=""><i class="bi bi-pencil-square"></i></a><a href=""><i
                                        class="bi bi-trash3"></i></a></span></span></li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-10">
            <div class="" id="create-website-app-react"></div>
            @if(count($portfolio->portfolio_section)>0)
            <div class="sections-right-content my-3">
                {{-- <ul id="sortable-section-list" class="list-group"> --}}
                    @foreach($portfolio->portfolio_section as $key => $section)
                    <section id="{{ $section->slug ?: $section->title }}">
                        {{ $section->slug ?: $section->title }}
                    </section>
                    @endforeach
                    {{--
                </ul> --}}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
