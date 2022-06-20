(function () {
const xmlString =
'<div style="height: 100vh; width: 100vw; display: grid; place-content: center;">'+
    @php
        $bgColor = $jsonData->backgroundColor ?? '#e85e5b';
    @endphp
    '<div style="display: flex; height: 494px; width: 494px; text-align: center; clip-path: circle(50%); background-color: {{ $bgColor }}">'+
        '<div style="overflow: hidden; border-radius: 99999px; border: 3px solid white; flex: 1; display: grid; place-content: center; margin: 10px;">'+
            '<div style="width: 350px">'+

                @if (!empty($jsonData) && !empty($jsonData->children))
                @foreach ($jsonData->children as $k => $child)
                    @if($child->type === 'text')
                        @php
                            $paddingBottom = $child->paddingBottom ?? "2";
                            $fontSize = $child->fontSize ?? "30";
                            $fontWeight = $child->fontWeight ?? "600";
                            $text = $child->text ?? "";
                            $color = $child->color ?? "#ffffff";
                        @endphp
                        '<p style="text-align: center; color: {{$color}}; font-size: {{$fontSize}}px; font-weight: {{$fontWeight}}; padding-bottom: {{$paddingBottom}}em">'+
                            '{{ $text }}'+
                            '</p>'+
                    @elseif($child->type === 'icon')
                        @php
                            $paddingBottom = $child->paddingBottom ?? "0";
                            $height = $child->height ?? "80px";
                            $color = $child->color ?? "#cb3635";
                        @endphp

                        '<div style="height: {{$height}}; margin-bottom: {{$paddingBottom}}em; display: flex; justify-content: center">'+
                            @for($n=0; $n<3; $n++)
                                @php
                                    $selfAlign = "center";
                                    if ($k == 0 && $n == 1) {
                                        $selfAlign = "flex-start";
                                    }

                                    if ($k == count($jsonData->children) && $n == 1) {
                                        $selfAlign = "flex-end";
                                    };
                                @endphp
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" style="color: {{$color}}; width: 30px; height: 30px; align-self: {{$selfAlign}}" viewBox="0 0 16 16">'+
                                    '<path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />'+
                                    '</svg>'+
                            @endfor
                            '</div>'+
                    @elseif($child->type === 'input')
                        @php
                            $fontSize = $child->fontSize ?? "12";
                            $paddingBottom = $child->paddingBottom ?? "2";
                            $placeholder = $child->placeholder ?? "Type here..."
                        @endphp
                        '<input type="text" placeholder="{{$placeholder}}" style="font-size: {{$fontSize}}px; margin-bottom: {{$paddingBottom}}em; width: 100%; border-radius: 16px; padding: 10px 15px; outline: none; border: none; color: #a4a6ad;" />'+
                    @elseif($child->type === 'button')
                        @php
                            $fontSize = $child->fontSize ?? "24";
                            $paddingBottom = $child->paddingBottom ?? "0";
                            $textColor = $child->textColor ?? "#ffffff";
                            $bgColor = $child->bgColor ?? "#404040";
                            $text = $child->text ?? "Submit";
                        @endphp
                        '<button style="color: {{$textColor}}; background-color: {{$bgColor}}; margin-bottom: {{$paddingBottom}}em; font-size: {{$fontSize}}px; border: none; border-radius: 12px; padding-block: 15px; font-weight: 900;width: 100%;" type="button">'+
                            '{{ $text }}'+
                            '</button>'+
                    @endif
                @endforeach
                @endif
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';

var doc = new DOMParser().parseFromString(xmlString, "text/xml");
    setTimeout( function () {
        console.log(doc.documentElement);
        document.body.appendChild(doc.documentElement);
    }, 5000);
})()
