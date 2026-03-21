@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="display:flex;align-items:center;justify-content:center;gap:4px;list-style:none;padding:16px 0;margin:0;">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li style="opacity:0.4;pointer-events:none;">
                    <span style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:16px;cursor:default;">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:16px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;color:rgba(255,255,255,0.4);font-size:14px;">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:linear-gradient(to bottom right, #e14eca, #ba54f5);color:#ffffff;font-size:14px;font-weight:500;">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:14px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.12)';this.style.color='#ffffff'" onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.6)'">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:16px;text-decoration:none;transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.12)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">&rsaquo;</a>
                </li>
            @else
                <li style="opacity:0.4;pointer-events:none;">
                    <span style="display:flex;align-items:center;justify-content:center;width:34px;height:34px;border-radius:6px;background:rgba(255,255,255,0.05);color:rgba(255,255,255,0.6);font-size:16px;cursor:default;">&rsaquo;</span>
                </li>
            @endif

        </ul>
    </nav>
@endif