@php
    $currentLang = session()->get('front_lang');
    $faqSection = getContent('digital_agency_faqs.content', true);
@endphp
<div class="section bg-light1 alzatheme-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="alzatheme-default-content">
                    <h2>{{ getTranslatedValue($faqSection, 'heading', $currentLang) }}</h2>
                    <p>{{ getTranslatedValue($faqSection, 'description', $currentLang) }}</p>
                    <div class="alzatheme-extra-mt" data-aos="fade-up" data-aos-duration="800">
                        <a class="alzatheme-default-btn" href="{{ route('faq') }}" data-text="{{ getTranslatedValue($faqSection, 'button_text', $currentLang) }}"><span
                                class="btn-wraper">{{ getTranslatedValue($faqSection, 'button_text', $currentLang) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="alzatheme-accordion-wrap init-wrap">
                    @foreach($faqs as $faq)
                        <div class="alzatheme-accordion-item {{ $loop->first ? 'open' : '' }}">
                            <div class="alzatheme-accordion-header init-header">
                                <h5> {{ __('translate.Q') }}{{ $loop->iteration }}. {{ $faq->translate?->question }}</h5>
                            </div>
                            <div class="alzatheme-accordion-body init-body">
                                <p>{!! clean($faq->translate?->answer) !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
