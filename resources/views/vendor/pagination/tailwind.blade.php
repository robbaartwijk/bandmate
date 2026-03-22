@if ($paginator->hasPages())
    <div style="border:1px solid rgba(255,255,255,0.15);border-radius:8px;padding:8px 12px;margin-top:8px;overflow:hidden;">
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;width:100%;">

        {{-- Left spacer: hidden on mobile, visible from md upward --}}
        <div style="min-width:160px;flex-shrink:1;display:none;" class="d-md-block"></div>

        {{-- Page buttons (centered) --}}
        <div>
            <span style="display:inline-flex;align-items:center;gap:4px;">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span style="opacity:0.4;pointer-events:none;display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);" aria-hidden="true">
                        <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @endif

                {{-- Page elements --}}
                @foreach ($elements as $element)
                    {{-- Three dots --}}
                    @if (is_string($element))
                        <span style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;color:rgba(255,255,255,0.4);font-size:13px;">{{ $element }}</span>
                    @endif

                    {{-- Page links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:linear-gradient(to bottom right,#e14eca,#ba54f5);color:#ffffff;font-size:13px;font-weight:500;">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:13px;text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,0.12)';this.style.color='#ffffff'" onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.6)'">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);text-decoration:none;" onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                        <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </a>
                @else
                    <span style="opacity:0.4;pointer-events:none;display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);" aria-hidden="true">
                        <svg style="width:16px;height:16px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                    </span>
                @endif

            </span>
        </div>

        {{-- Results count: hidden on mobile, visible from md upward --}}
        <div style="min-width:160px;text-align:right;flex-shrink:1;display:none;" class="d-md-block">
            <p style="font-size:13px;color:rgba(255,255,255,0.5);margin:0;">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span style="font-weight:500;color:rgba(255,255,255,0.8);">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span style="font-weight:500;color:rgba(255,255,255,0.8);">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span style="font-weight:500;color:rgba(255,255,255,0.8);">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

    </nav>
    </div>
@endif