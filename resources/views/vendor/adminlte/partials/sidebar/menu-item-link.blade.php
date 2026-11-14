<li @isset($item['id']) id="{{ $item['id'] }}" @endisset class="nav-item">

    <a class="nav-link {{ $item['class'] }} @isset($item['shift']) {{ $item['shift'] }} @endisset"
       href="{{ $item['href'] }}" @isset($item['target']) target="{{ $item['target'] }}" @endisset
       {!! $item['data-compiled'] ?? '' !!}>

        <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{
            isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''
        }}"></i>

        <p>
            {{ $item['text'] }}

            @isset($item['label'])
                <span class="badge badge-{{ $item['label_color'] ?? 'primary' }} right">
                    {{ $item['label'] }}
                </span>
            @endisset
        </p>
        @if($item['text'] == '季節のつけかけ管理')
            @php
                $season_pasta = App\Models\SeasonPasta::all();
                $overlap_ids = [];
                foreach ($season_pasta as $i => $pasta) {
                    foreach ($season_pasta as $j => $other) {
                        if ($i >= $j) {
                            continue;
                        }
                        if ($pasta->reservation_at <= $other->expired_at && $pasta->expired_at >= $other->reservation_at) {
                            $overlap_ids[] = $pasta->id;
                            $overlap_ids[] = $other->id;
                        }
                    }
                }
                $overlap_ids = array_unique($overlap_ids);
            @endphp
            @if($overlap_ids)
                <svg class="alert-no-movie" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#dc3545" d="M256,512C114.6,512,0,397.4,0,256S114.6,0,256,0s256,114.6,256,256-114.6,256-256,256Z"/>
                    <path fill="#fff" d="M256,320c-17.7,0-32,14.3-32,32s14.3,32,32,32,32-14.3,32-32-14.3-32-32-32Z"/>
                    <path fill="#fff" d="M256,128c-18.2,0-32.7,15.5-31.4,33.7l7.4,104c.9,12.6,11.4,22.3,23.9,22.3s23-9.7,23.9-22.3l7.4-104c1.3-18.2-13.1-33.7-31.4-33.7h.2Z"/>
                </svg>
            @endif
        @endif
        @if($item['text'] == '動画管理')
            @php
                $has_first_movie = App\Models\Video::where('is_visible', true)->where('first_video', true)->exists();
            @endphp
            @if(!$has_first_movie)
                <svg class="alert-no-movie" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#dc3545" d="M256,512C114.6,512,0,397.4,0,256S114.6,0,256,0s256,114.6,256,256-114.6,256-256,256Z"/>
                    <path fill="#fff" d="M256,320c-17.7,0-32,14.3-32,32s14.3,32,32,32,32-14.3,32-32-14.3-32-32-32Z"/>
                    <path fill="#fff" d="M256,128c-18.2,0-32.7,15.5-31.4,33.7l7.4,104c.9,12.6,11.4,22.3,23.9,22.3s23-9.7,23.9-22.3l7.4-104c1.3-18.2-13.1-33.7-31.4-33.7h.2Z"/>
                </svg>
            @endif
        @endif
    </a>

</li>
