<?php
use App\Http\Controllers\Tools\WhatsMyBrowserController;
use App\Http\Controllers\Tools\JsonToXmlController;
use App\Http\Controllers\Tools\XmlToJsonController;
use App\Http\Controllers\Tools\OpenPortCheckerController;
use App\Http\Controllers\Tools\JsonBeautifierController;
use App\Http\Controllers\Tools\JsonValidatorController;
use App\Http\Controllers\Tools\BmiCalculatorController;
use App\Http\Controllers\Tools\SmtpTestController;
use App\Http\Controllers\Tools\GzipTestController;
use App\Http\Controllers\Tools\QuotedPrintableEncodeController;
use App\Http\Controllers\Tools\QuotedPrintableDecodeController;

use App\Filament\Pages\Tools\ManageBcryptGeneratorSettings;
use App\Filament\Pages\Tools\ManageBinaryToTextSettings;
use App\Filament\Pages\Tools\ManageCaseConverterSettings;
use App\Filament\Pages\Tools\ManageCreditCardValidatorSettings;
use App\Filament\Pages\Tools\ManageCSSFormatterSettings;
use App\Filament\Pages\Tools\ManageCSSMinifierSettings;
use App\Filament\Pages\Tools\ManageCSVToJSONSettings;
use App\Filament\Pages\Tools\ManageDomainGeneratorSettings;
use App\Filament\Pages\Tools\ManageDomainWhoisSettings;
use App\Filament\Pages\Tools\ManageDuplicateLinesRemoverSettings;
use App\Filament\Pages\Tools\ManageEmailExtractorSettings;
use App\Filament\Pages\Tools\ManageEmailValidatorSettings;
use App\Filament\Pages\Tools\ManageHashGeneratorSettings;
use App\Filament\Pages\Tools\ManageHexToRGBSettings;
use App\Filament\Pages\Tools\ManageHostnameToIPSettings;
use App\Filament\Pages\Tools\ManageHTACCESSRedirectGeneratorSettings;
use App\Filament\Pages\Tools\ManageHTMLEntityDecodeSettings;
use App\Filament\Pages\Tools\ManageHTMLEntityEncodeSettings;
use App\Filament\Pages\Tools\ManageHTMLFormatterSettings;
use App\Filament\Pages\Tools\ManageHTMLMinifierSettings;
use App\Filament\Pages\Tools\ManageHTMLTagsStripperSettings;
use App\Filament\Pages\Tools\ManageHTMLToMarkdownSettings;
use App\Filament\Pages\Tools\ManageHTTPHeadersParserSettings;
use App\Filament\Pages\Tools\ManageHTTPStatusCodeCheckerSettings;
use App\Filament\Pages\Tools\ManageImageCompressorSettings;
use App\Filament\Pages\Tools\ManageImageResizerSettings;
use App\Filament\Pages\Tools\ManageImageToBase64Settings;
use App\Filament\Pages\Tools\ManageIPInformationSettings;
use App\Filament\Pages\Tools\ManageIPToHostnameSettings;
use App\Filament\Pages\Tools\ManageJPGToPNGSettings;
use App\Filament\Pages\Tools\ManageJPGToWEBPSettings;
use App\Filament\Pages\Tools\ManageJSFormatterSettings;
use App\Filament\Pages\Tools\ManageJSMinifierSettings;
use App\Filament\Pages\Tools\ManageJSObfuscatorSettings;
use App\Filament\Pages\Tools\ManageJSONToCSVSettings;
use App\Filament\Pages\Tools\ManageLineBreakRemoverSettings;
use App\Filament\Pages\Tools\ManageLoremIpsumGeneratorSettings;
use App\Filament\Pages\Tools\ManageMarkdownToHTMLSettings;
use App\Filament\Pages\Tools\ManageMD5GeneratorSettings;
use App\Filament\Pages\Tools\ManageMemoryStorageConverterSettings;
use App\Filament\Pages\Tools\ManagePalindromeCheckerSettings;
use App\Filament\Pages\Tools\ManagePasswordGeneratorSettings;
use App\Filament\Pages\Tools\ManagePasswordStrengthTestSettings;
use App\Filament\Pages\Tools\ManagePingSettings;
use App\Filament\Pages\Tools\ManagePNGToJPGSettings;
use App\Filament\Pages\Tools\ManagePNGToWEBPSettings;
use App\Filament\Pages\Tools\ManagePrivacyPolicyGeneratorSettings;
use App\Filament\Pages\Tools\ManagePunycodeToUnicodeSettings;
use App\Filament\Pages\Tools\ManageQRCodeReaderSettings;
use App\Filament\Pages\Tools\ManageQRGeneratorSettings;
use App\Filament\Pages\Tools\ManageRandomNumberGeneratorSettings;
use App\Filament\Pages\Tools\ManageRedirectCheckerSettings;
use App\Filament\Pages\Tools\ManageRGBToHexSettings;
use App\Filament\Pages\Tools\ManageRobotstxtGeneratorSettings;
use App\Filament\Pages\Tools\ManageROT13DecoderSettings;
use App\Filament\Pages\Tools\ManageROT13EncoderSettings;
use App\Filament\Pages\Tools\ManageSEOTagsGeneratorSettings;
use App\Filament\Pages\Tools\ManageSHAGeneratorSettings;
use App\Filament\Pages\Tools\ManageSourceCodeDownloaderSettings;
use App\Filament\Pages\Tools\ManageSQLBeautifierSettings;
use App\Filament\Pages\Tools\ManageSSLCheckerSettings;
use App\Filament\Pages\Tools\ManageTermsOfServiceGeneratorSettings;
use App\Filament\Pages\Tools\ManageTextReplacerSettings;
use App\Filament\Pages\Tools\ManageTextReverserSettings;
use App\Filament\Pages\Tools\ManageTextSeparatorSettings;
use App\Filament\Pages\Tools\ManageTextToBase64Settings;
use App\Filament\Pages\Tools\ManageBase64ToTextSettings;
use App\Filament\Pages\Tools\ManageDnsLookupSettings;
use App\Filament\Pages\Tools\ManageTextToBinarySettings;
use App\Filament\Pages\Tools\ManageTextToSlugSettings;
use App\Filament\Pages\Tools\ManageTimestampConverterSettings;
use App\Filament\Pages\Tools\ManageTwitterCardGeneratorSettings;
use App\Filament\Pages\Tools\ManageUnicodeToPunycodeSettings;
use App\Filament\Pages\Tools\ManageURLDecoderSettings;
use App\Filament\Pages\Tools\ManageURLEncoderSettings;
use App\Filament\Pages\Tools\ManageURLExtractorSettings;
use App\Filament\Pages\Tools\ManageURLParserSettings;
use App\Filament\Pages\Tools\ManageURLUnshortenerSettings;
use App\Filament\Pages\Tools\ManageUserAgentFinderSettings;
use App\Filament\Pages\Tools\ManageUUIDv4GeneratorSettings;
use App\Filament\Pages\Tools\ManageWEBPToJPGSettings;
use App\Filament\Pages\Tools\ManageWEBPToPNGSettings;
use App\Filament\Pages\Tools\ManageWebsiteStatusCheckerSettings;
use App\Filament\Pages\Tools\ManageWhatsMyIpSettings;
use App\Filament\Pages\Tools\ManageWordCountSettings;
use App\Filament\Pages\Tools\ManageWordDensityCounterSettings;
use App\Filament\Pages\Tools\ManageYouTubeThumbnailDownloaderSettings;
use App\Filament\Pages\Tools\ManageWhatsMyBrowserSettings;
use App\Filament\Pages\Tools\ManageJsonToXmlSettings;
use App\Filament\Pages\Tools\ManageXmlToJsonSettings;
use App\Filament\Pages\Tools\ManageOpenPortCheckerSettings;
use App\Filament\Pages\Tools\ManageJsonBeautifierSettings;
use App\Filament\Pages\Tools\ManageJsonValidatorSettings;
use App\Filament\Pages\Tools\ManageBmiCalculatorSettings;
use App\Filament\Pages\Tools\ManageSmtpTestSettings;
use App\Filament\Pages\Tools\ManageGzipTestSettings;
use App\Filament\Pages\Tools\ManageRandomTextLineSettings;
use App\Filament\Pages\Tools\ManageQuotedPrintableEncodeSettings;
use App\Filament\Pages\Tools\ManageQuotedPrintableDecodeSettings;
use App\Http\Livewire\Tools\BcryptGenerator;
use App\Http\Livewire\Tools\CSVToJSON;
use App\Http\Livewire\Tools\DomainGenerator;
use App\Http\Livewire\Tools\DomainWhois;
use App\Http\Livewire\Tools\HashGenerator;
use App\Http\Livewire\Tools\HostnameToIP;
use App\Http\Livewire\Tools\HTTPHeadersParser;
use App\Http\Livewire\Tools\HTTPStatusCodeChecker;
use App\Http\Livewire\Tools\JSONToCSV;
use App\Http\Livewire\Tools\MD5Generator;
use App\Http\Livewire\Tools\Ping;
use App\Http\Livewire\Tools\PrivacyPolicyGenerator;
use App\Http\Livewire\Tools\QRGenerator;
use App\Http\Livewire\Tools\RedirectChecker;
use App\Http\Livewire\Tools\ROT13Decoder;
use App\Http\Livewire\Tools\ROT13Encoder;
use App\Http\Livewire\Tools\SHAGenerator;
use App\Http\Livewire\Tools\SourceCodeDownloader;
use App\Http\Livewire\Tools\SSLChecker;
use App\Http\Livewire\Tools\TermsOfService;
use App\Http\Livewire\Tools\TermsOfServiceGenerator;
use App\Http\Livewire\Tools\TimestampConverter;
use App\Http\Livewire\Tools\URLDecoder;
use App\Http\Livewire\Tools\URLEncoder;
use App\Http\Livewire\Tools\URLUnshortener;
use App\Http\Livewire\Tools\UserAgentFinder;
use App\Http\Livewire\Tools\UUIDv4Generator;
use App\Http\Livewire\Tools\WebsiteStatusChecker;
use App\Http\Livewire\Tools\WhatsMyIp;
use App\Settings\Tools\BcryptGeneratorSettings;
use App\Settings\Tools\BinaryToTextSettings;
use App\Settings\Tools\CaseConverterSettings;
use App\Settings\Tools\CreditCardValidatorSettings;
use App\Settings\Tools\CSSFormatterSettings;
use App\Settings\Tools\CSSMinifierSettings;
use App\Settings\Tools\CSVToJSONSettings;
use App\Settings\Tools\DomainGeneratorSettings;
use App\Settings\Tools\DomainWhoisSettings;
use App\Settings\Tools\DuplicateLinesRemoverSettings;
use App\Settings\Tools\EmailExtractorSettings;
use App\Settings\Tools\EmailValidatorSettings;
use App\Settings\Tools\HashGeneratorSettings;
use App\Settings\Tools\HexToRGBSettings;
use App\Settings\Tools\HostnameToIPSettings;
use App\Settings\Tools\HTACCESSRedirectGeneratorSettings;
use App\Settings\Tools\HTMLEntityDecodeSettings;
use App\Settings\Tools\HTMLEntityEncodeSettings;
use App\Settings\Tools\HTMLFormatterSettings;
use App\Settings\Tools\HTMLMinifierSettings;
use App\Settings\Tools\HTMLTagsStripperSettings;
use App\Settings\Tools\HTMLToMarkdownSettings;
use App\Settings\Tools\HTTPHeadersParserSettings;
use App\Settings\Tools\HTTPStatusCodeCheckerSettings;
use App\Settings\Tools\ImageCompressorSettings;
use App\Settings\Tools\ImageResizerSettings;
use App\Settings\Tools\ImageToBase64Settings;
use App\Settings\Tools\IPInformationSettings;
use App\Settings\Tools\IPToHostnameSettings;
use App\Settings\Tools\JPGToPNGSettings;
use App\Settings\Tools\JPGToWEBPSettings;
use App\Settings\Tools\JSFormatterSettings;
use App\Settings\Tools\JSMinifierSettings;
use App\Settings\Tools\JSObfuscatorSettings;
use App\Settings\Tools\JSONToCSVSettings;
use App\Settings\Tools\LineBreakRemoverSettings;
use App\Settings\Tools\LoremIpsumGeneratorSettings;
use App\Settings\Tools\MarkdownToHTMLSettings;
use App\Settings\Tools\MD5GeneratorSettings;
use App\Settings\Tools\MemoryStorageConverterSettings;
use App\Settings\Tools\PalindromeCheckerSettings;
use App\Settings\Tools\PasswordGeneratorSettings;
use App\Settings\Tools\PasswordStrengthTestSettings;
use App\Settings\Tools\PingSettings;
use App\Settings\Tools\PNGToJPGSettings;
use App\Settings\Tools\PNGToWEBPSettings;
use App\Settings\Tools\PrivacyPolicyGeneratorSettings;
use App\Settings\Tools\PunycodeToUnicodeSettings;
use App\Settings\Tools\QRCodeReaderSettings;
use App\Settings\Tools\QRGeneratorSettings;
use App\Settings\Tools\RandomNumberGeneratorSettings;
use App\Settings\Tools\RedirectCheckerSettings;
use App\Settings\Tools\RGBToHexSettings;
use App\Settings\Tools\RobotstxtGenerator;
use App\Settings\Tools\RobotstxtGeneratorSettings;
use App\Settings\Tools\ROT13DecoderSettings;
use App\Settings\Tools\ROT13EncoderSettings;
use App\Settings\Tools\SEOTagsGeneratorSettings;
use App\Settings\Tools\SHAGeneratorSettings;
use App\Settings\Tools\SourceCodeDownloaderSettings;
use App\Settings\Tools\SQLBeautifierSettings;
use App\Settings\Tools\SSLCheckerSettings;
use App\Settings\Tools\TermsOfServiceGeneratorSettings;
use App\Settings\Tools\TextReplacerSettings;
use App\Settings\Tools\TextReverserSettings;
use App\Settings\Tools\TextSeparatorSettings;
use App\Settings\Tools\TextToBase64Settings;
use App\Settings\Tools\Base64ToTextSettings;
use App\Settings\Tools\DnsLookupSettings;
use App\Settings\Tools\TextToBinarySettings;
use App\Settings\Tools\TextToSlugSettings;
use App\Settings\Tools\TimestampConverterSettings;
use App\Settings\Tools\TwitterCardGeneratorSettings;
use App\Settings\Tools\UnicodeToPunycodeSettings;
use App\Settings\Tools\URLDecoderSettings;
use App\Settings\Tools\URLEncoderSettings;
use App\Settings\Tools\URLExtractorSettings;
use App\Settings\Tools\URLParserSettings;
use App\Settings\Tools\URLUnshortenerSettings;
use App\Settings\Tools\UserAgentFinderSettings;
use App\Settings\Tools\UUIDv4GeneratorSettings;
use App\Settings\Tools\WEBPToJPGSettings;
use App\Settings\Tools\WEBPToPNGSettings;
use App\Settings\Tools\WebsiteStatusCheckerSettings;
use App\Settings\Tools\WhatsMyIpSettings;
use App\Settings\Tools\WordCountSettings;
use App\Settings\Tools\WordDensityCounterSettings;
use App\Settings\Tools\YouTubeThumbnailDownloaderSettings;
use App\Settings\Tools\WhatsMyBrowserSettings;
use App\Settings\Tools\JsonToXmlSettings;
use App\Settings\Tools\XmlToJsonSettings;
use App\Settings\Tools\OpenPortCheckerSettings;
use App\Settings\Tools\JsonBeautifierSettings;
use App\Settings\Tools\JsonValidatorSettings;
use App\Settings\Tools\BmiCalculatorSettings;
use App\Settings\Tools\SmtpTestSettings;
use App\Settings\Tools\GzipTestSettings;
use App\Settings\Tools\RandomTextLineSettings;
use App\Settings\Tools\QuotedPrintableEncodeSettings;
use App\Settings\Tools\QuotedPrintableDecodeSettings;

return [
    'categories' => [
        'Utilities' => [
            'view'  => 'modules.categories.utilities',
            'admin' => [
                'title' => 'Utilities'
            ],

            'tools' => [
                'WebsiteStatusChecker' => [
                    'name' => 'website-status-checker',

                    'settings'  => WebsiteStatusCheckerSettings::class,
                    'component' => WebsiteStatusChecker::class,

                    'templates' => [
                        'header'   => 'modules.tools.website-status-checker.header',
                        'selector' => 'modules.tools.website-status-checker.selector'
                    ],

                    'admin' => [
                        'title'         => 'Website Status Checker',
                        'summary'       => 'Check the Status of any Website',
                        'settings-page' => ManageWebsiteStatusCheckerSettings::class
                    ]
                ],

                'UserAgentFinder' => [
                    'name' => 'user-agent-finder',

                    'settings'  => UserAgentFinderSettings::class,
                    'component' => UserAgentFinder::class,

                    'templates' => [
                        'header'   => 'modules.tools.user-agent-finder.header',
                        'selector' => 'modules.tools.user-agent-finder.selector'
                    ],

                    'admin' => [
                        'title'         => 'User Agent Finder',
                        'summary'       => 'Find your the User Agent',
                        'settings-page' => ManageUserAgentFinderSettings::class
                    ]
                ],

                'WhatsMyIp' => [
                    'name' => 'whats-my-ip',

                    'settings'  => WhatsMyIpSettings::class,
                    'view'      => 'modules.tools.whats-my-ip.view',

                    'templates' => [
                        'header'   => 'modules.tools.whats-my-ip.header',
                        'selector' => 'modules.tools.whats-my-ip.selector'
                    ],

                    'admin' => [
                        'title'         => 'Whats My IP',
                        'summary'       => 'Find your IP Address',
                        'settings-page' => ManageWhatsMyIpSettings::class
                    ]
                ],

                'Ping' => [
                    'name' => 'ping',

                    'settings'  => PingSettings::class,
                    'component' => Ping::class,

                    'templates' => [
                        'header'   => 'modules.tools.ping.header',
                        'selector' => 'modules.tools.ping.selector'
                    ],

                    'admin' => [
                        'title'         => 'Ping',
                        'summary'       => 'Measure latency from any Address',
                        'settings-page' => ManagePingSettings::class
                    ]
                ],

                'URLUnshortener' => [
                    'name' => 'url-unshortener',

                    'settings'  => URLUnshortenerSettings::class,
                    'component' => URLUnshortener::class,

                    'templates' => [
                        'header'   => 'modules.tools.url-unshortener.header',
                        'selector' => 'modules.tools.url-unshortener.selector'
                    ],

                    'admin' => [
                        'title'         => 'URL Unshortener',
                        'summary'       => 'Unshorten your URLs',
                        'settings-page' => ManageURLUnshortenerSettings::class
                    ]
                ],

                'URLEncoder' => [
                    'name' => 'url-encoder',

                    'settings'  => URLEncoderSettings::class,
                    'component' => URLEncoder::class,

                    'templates' => [
                        'header'   => 'modules.tools.url-encoder.header',
                        'selector' => 'modules.tools.url-encoder.selector'
                    ],

                    'admin' => [
                        'title'         => 'URL Encoder',
                        'summary'       => 'Encode your URLs',
                        'settings-page' => ManageURLEncoderSettings::class
                    ]
                ],

                'URLDecoder' => [
                    'name' => 'url-decoder',

                    'settings'  => URLDecoderSettings::class,
                    'component' => URLDecoder::class,

                    'templates' => [
                        'header'   => 'modules.tools.url-decoder.header',
                        'selector' => 'modules.tools.url-decoder.selector'
                    ],

                    'admin' => [
                        'title'         => 'URL Decoder',
                        'summary'       => 'Decode your URLs',
                        'settings-page' => ManageURLDecoderSettings::class
                    ]
                ],

                'SSLChecker' => [
                    'name' => 'ssl-checker',

                    'settings'  => SSLCheckerSettings::class,
                    'component' => SSLChecker::class,

                    'templates' => [
                        'header'   => 'modules.tools.ssl-checker.header',
                        'selector' => 'modules.tools.ssl-checker.selector'
                    ],

                    'admin' => [
                        'title'         => 'SSL Checker',
                        'summary'       => 'Validate SSL Certificates',
                        'settings-page' => ManageSSLCheckerSettings::class
                    ]
                ],

                'QRGenerator' => [
                    'name' => 'qr-generator',

                    'settings'  => QRGeneratorSettings::class,
                    'view'      => 'modules.tools.qr-generator.view',

                    'templates' => [
                        'header'   => 'modules.tools.qr-generator.header',
                        'selector' => 'modules.tools.qr-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'QR Code Generator',
                        'summary'       => 'Create QR Codes',
                        'settings-page' => ManageQRGeneratorSettings::class
                    ]
                ],

                'QRCodeReader' => [
                    'name' => 'qr-code-reader',

                    'settings'  => QRCodeReaderSettings::class,
                    'view'      => 'modules.tools.qr-code-reader.view',

                    'templates' => [
                        'header'   => 'modules.tools.qr-code-reader.header',
                        'selector' => 'modules.tools.qr-code-reader.selector'
                    ],

                    'scripts' => [
                        ['js/qr-scanner.js', 'internal']
                    ],

                    'admin' => [
                        'title'         => 'QR Code Reader',
                        'summary'       => 'Read QR Codes',
                        'settings-page' => ManageQRCodeReaderSettings::class
                    ]
                ],

                'HTTPHeadersParser' => [
                    'name' => 'http-headers-parser',

                    'settings'  => HTTPHeadersParserSettings::class,
                    'component' => HTTPHeadersParser::class,

                    'templates' => [
                        'header'   => 'modules.tools.http-headers-parser.header',
                        'selector' => 'modules.tools.http-headers-parser.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTTP Headers Parser',
                        'summary'       => 'View & Parse HTTP Headers',
                        'settings-page' => ManageHTTPHeadersParserSettings::class
                    ]
                ],

                'UUIDv4Generator' => [
                    'name' => 'uuidv4-generator',

                    'settings'  => UUIDv4GeneratorSettings::class,
                    'component' => UUIDv4Generator::class,

                    'templates' => [
                        'header'   => 'modules.tools.uuidv4-generator.header',
                        'selector' => 'modules.tools.uuidv4-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'UUIDv4 Generator',
                        'summary'       => 'Generate UUIDv4 IDs',
                        'settings-page' => ManageUUIDv4GeneratorSettings::class
                    ]
                ],

                'YouTubeThumbnailDownloader' => [
                    'name' => 'youtube-thumbnail-downloader',

                    'settings'  => YouTubeThumbnailDownloaderSettings::class,
                    'view' => 'modules.tools.youtube-thumbnail-downloader.view',

                    'templates' => [
                        'header'   => 'modules.tools.youtube-thumbnail-downloader.header',
                        'selector' => 'modules.tools.youtube-thumbnail-downloader.selector'
                    ],

                    'admin' => [
                        'title'         => 'YouTube Thumbnail Downloader',
                        'summary'       => 'Download YouTube Thumbnails',
                        'settings-page' => ManageYouTubeThumbnailDownloaderSettings::class
                    ]
                ],

                'EmailValidator' => [
                    'name' => 'email-validator',

                    'settings'  => EmailValidatorSettings::class,
                    'view' => 'modules.tools.email-validator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.email-validator.header',
                        'selector' => 'modules.tools.email-validator.selector'
                    ],

                    'admin' => [
                        'title'         => 'E-mail Validator',
                        'summary'       => 'Validate E-mail Addressess',
                        'settings-page' => ManageEmailValidatorSettings::class
                    ]
                ],

                'RedirectChecker' => [
                    'name' => 'redirect-checker',

                    'settings'  => RedirectCheckerSettings::class,
                    'component' => RedirectChecker::class,

                    'templates' => [
                        'header'   => 'modules.tools.redirect-checker.header',
                        'selector' => 'modules.tools.redirect-checker.selector'
                    ],

                    'admin' => [
                        'title'         => 'Redirect Checker',
                        'summary'       => 'Check where a page redirects to.',
                        'settings-page' => ManageRedirectCheckerSettings::class
                    ]
                ],

                'RandomNumberGenerator' => [
                    'name' => 'random-number-generator',

                    'settings'  => RandomNumberGeneratorSettings::class,

                    'view' => 'modules.tools.random-number-generator.view',

                    'templates' => [
                        'header'   => 'modules.tools.random-number-generator.header',
                        'selector' => 'modules.tools.random-number-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Random Number Generator',
                        'summary'       => 'Generate Random Numbers in Range',
                        'settings-page' => ManageRandomNumberGeneratorSettings::class
                    ]
                ],
            ]
        ],

        'Converters' => [
            'view' => 'modules.categories.converters',
            'admin' => [
                'title' => 'Converters'
            ],

            'tools' => [
                'RGBToHex' => [
                    'name' => 'rgb-to-hex',

                    'settings'  => RGBToHexSettings::class,
                    'view'      => 'modules.tools.rgb-to-hex.view',

                    'templates' => [
                        'header'   => 'modules.tools.rgb-to-hex.header',
                        'selector' => 'modules.tools.rgb-to-hex.selector'
                    ],

                    'admin' => [
                        'title'         => 'RGB To Hex',
                        'summary'       => 'Convert RGB to Hex Colors',
                        'settings-page' => ManageRGBToHexSettings::class
                    ]
                ],

                'HexToRGB' => [
                    'name' => 'hex-to-rgb',

                    'settings'  => HexToRGBSettings::class,
                    'view'      => 'modules.tools.hex-to-rgb.view',

                    'templates' => [
                        'header'   => 'modules.tools.hex-to-rgb.header',
                        'selector' => 'modules.tools.hex-to-rgb.selector'
                    ],

                    'admin' => [
                        'title'         => 'Hex To RGB',
                        'summary'       => 'Convert Hex to RGB Colors',
                        'settings-page' => ManageHexToRGBSettings::class
                    ]
                ],

                'TimestampConverter' => [
                    'name' => 'timestamp-converter',

                    'settings'  => TimestampConverterSettings::class,
                    'component' => TimestampConverter::class,

                    'templates' => [
                        'header'   => 'modules.tools.timestamp-converter.header',
                        'selector' => 'modules.tools.timestamp-converter.selector'
                    ],

                    'admin' => [
                        'title'         => 'Timestamp Converter',
                        'summary'       => 'Convert UNIX Timestamps',
                        'settings-page' => ManageTimestampConverterSettings::class
                    ]
                ],

                'TextToBinary' => [
                    'name' => 'text-to-binary',

                    'settings'  => TextToBinarySettings::class,
                    'view' => 'modules.tools.text-to-binary.view',

                    'templates' => [
                        'header'   => 'modules.tools.text-to-binary.header',
                        'selector' => 'modules.tools.text-to-binary.selector'
                    ],

                    'admin' => [
                        'title'         => 'Text To Binary',
                        'summary'       => 'Convert Text to Binary',
                        'settings-page' => ManageTextToBinarySettings::class
                    ]
                ],

                'BinaryToText' => [
                    'name' => 'binary-to-text',

                    'settings'  => BinaryToTextSettings::class,
                    'view' => 'modules.tools.binary-to-text.view',

                    'templates' => [
                        'header'   => 'modules.tools.binary-to-text.header',
                        'selector' => 'modules.tools.binary-to-text.selector'
                    ],

                    'admin' => [
                        'title'         => 'Binary to Text',
                        'summary'       => 'Convert Binary to Text',
                        'settings-page' => ManageBinaryToTextSettings::class
                    ]
                ],

                'TextToBase64' => [
                    'name' => 'text-to-base64',

                    'settings'  => TextToBase64Settings::class,
                    'view' => 'modules.tools.text-to-base64.view',

                    'templates' => [
                        'header'   => 'modules.tools.text-to-base64.header',
                        'selector' => 'modules.tools.text-to-base64.selector'
                    ],

                    'admin' => [
                        'title'         => 'Text to Base64',
                        'summary'       => 'Convert Text to Base64',
                        'settings-page' => ManageTextToBase64Settings::class
                    ]
                ],

                'Base64ToText' => [
                    'name' => 'base64-to-text',

                    'settings'  => Base64ToTextSettings::class,
                    'view' => 'modules.tools.base64-to-text.view',

                    'templates' => [
                        'header'   => 'modules.tools.base64-to-text.header',
                        'selector' => 'modules.tools.base64-to-text.selector'
                    ],

                    'admin' => [
                        'title'         => 'Base64 To Text',
                        'summary'       => 'Convert Base64 To Text',
                        'settings-page' => ManageBase64ToTextSettings::class
                    ]
                ],

                'ImageToBase64' => [
                    'name' => 'image-to-base64',

                    'settings'  => ImageToBase64Settings::class,
                    'view' => 'modules.tools.image-to-base64.view',

                    'templates' => [
                        'header'   => 'modules.tools.image-to-base64.header',
                        'selector' => 'modules.tools.image-to-base64.selector'
                    ],

                    'admin' => [
                        'title'         => 'Image to Base64',
                        'summary'       => 'Convert Images to Base64',
                        'settings-page' => ManageImageToBase64Settings::class
                    ]
                ],

                'MarkdownToHTML' => [
                    'name' => 'markdown-to-html',

                    'settings'  => MarkdownToHTMLSettings::class,
                    'view' => 'modules.tools.markdown-to-html.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-html.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify.min.js',      'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-css.min.js',  'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-html.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.markdown-to-html.header',
                        'selector' => 'modules.tools.markdown-to-html.selector'
                    ],

                    'admin' => [
                        'title'         => 'Markdown To HTML',
                        'summary'       => 'Convert Markdown to HTML',
                        'settings-page' => ManageMarkdownToHTMLSettings::class
                    ]
                ],

                'HTMLToMarkdown' => [
                    'name' => 'html-to-markdown',

                    'settings'  => HTMLToMarkdownSettings::class,
                    'view' => 'modules.tools.html-to-markdown.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-html.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify.min.js',      'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-css.min.js',  'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-html.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.html-to-markdown.header',
                        'selector' => 'modules.tools.html-to-markdown.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML To Markdown',
                        'summary'       => 'Convert HTML to Markdown',
                        'settings-page' => ManageHTMLToMarkdownSettings::class
                    ]
                ],

                'CSVToJSON' => [
                    'name' => 'csv-to-json',

                    'settings'  => CSVToJSONSettings::class,
                    'component' => CSVToJSON::class,

                    'templates' => [
                        'header'   => 'modules.tools.csv-to-json.header',
                        'selector' => 'modules.tools.csv-to-json.selector'
                    ],

                    'admin' => [
                        'title'         => 'CSV To JSON',
                        'summary'       => 'Convert CSV to JSON',
                        'settings-page' => ManageCSVToJSONSettings::class
                    ]
                ],

                'JSONToCSV' => [
                    'name' => 'json-to-csv',

                    'settings'  => JSONToCSVSettings::class,
                    'component' => JSONToCSV::class,

                    'templates' => [
                        'header'   => 'modules.tools.json-to-csv.header',
                        'selector' => 'modules.tools.json-to-csv.selector'
                    ],

                    'admin' => [
                        'title'         => 'JSON To CSV',
                        'summary'       => 'Convert JSON to CSV',
                        'settings-page' => ManageJSONToCSVSettings::class
                    ]
                ],

                'JsonToXml' => [
                    'name' => 'json-to-xml',

                    'settings'  => JsonToXmlSettings::class,
                    'controller' => JsonToXmlController::class,

                    'templates' => [
                        'header'   => 'modules.tools.json-to-xml.header',
                        'selector' => 'modules.tools.json-to-xml.selector'
                    ],

                    'admin' => [
                        'title'         => 'JSON To XML',
                        'summary'       => 'It helps to convert your JSON data to XML format.',
                        'settings-page' => ManageJsonToXmlSettings::class
                    ]
                ],

                'XmlToJson' => [
                    'name' => 'xml-to-json',

                    'settings'  => XmlToJsonSettings::class,
                    'controller' => XmlToJsonController::class,

                    'templates' => [
                        'header'   => 'modules.tools.xml-to-json.header',
                        'selector' => 'modules.tools.xml-to-json.selector'
                    ],

                    'admin' => [
                        'title'         => 'XML To JSON',
                        'summary'       => 'It helps to convert your XML data to JSON format.',
                        'settings-page' => ManageXmlToJsonSettings::class
                    ]
                ],

                'JsonBeautifier' => [
                    'name' => 'json-beautifier',

                    'settings'  => JsonBeautifierSettings::class,
                    'controller' => JsonBeautifierController::class,

                    'templates' => [
                        'header'   => 'modules.tools.json-beautifier.header',
                        'selector' => 'modules.tools.json-beautifier.selector'
                    ],

                    'admin' => [
                        'title'         => 'JSON Beautifier',
                        'summary'       => 'Online JSON Viewer, JSON Beautifier and Formatter to beautify and tree view of JSON data.',
                        'settings-page' => ManageJsonBeautifierSettings::class
                    ]
                ],

                'JsonValidator' => [
                    'name' => 'json-validator',

                    'settings'  => JsonValidatorSettings::class,
                    'controller' => JsonValidatorController::class,

                    'templates' => [
                        'header'   => 'modules.tools.json-validator.header',
                        'selector' => 'modules.tools.json-validator.selector'
                    ],

                    'admin' => [
                        'title'         => 'JSON Validator',
                        'summary'       => 'JSON Validator is the free online validator tool for JSON.',
                        'settings-page' => ManageJsonValidatorSettings::class
                    ]
                ],

                'ROT13Encoder' => [
                    'name' => 'rot13-encoder',

                    'settings'  => ROT13EncoderSettings::class,

                    'component' => ROT13Encoder::class,
                    'templates' => [
                        'header'   => 'modules.tools.rot13-encoder.header',
                        'selector' => 'modules.tools.rot13-encoder.selector'
                    ],

                    'admin' => [
                        'title'         => 'ROT13 Encoder',
                        'summary'       => 'Encode data to any ROT value.',
                        'settings-page' => ManageROT13EncoderSettings::class
                    ]
                ],

                'ROT13Decoder' => [
                    'name' => 'rot13-decoder',

                    'settings'  => ROT13DecoderSettings::class,

                    'component' => ROT13Decoder::class,
                    'templates' => [
                        'header'   => 'modules.tools.rot13-decoder.header',
                        'selector' => 'modules.tools.rot13-decoder.selector'
                    ],

                    'admin' => [
                        'title'         => 'ROT13 Decoder',
                        'summary'       => 'Decode data from any ROT value.',
                        'settings-page' => ManageROT13DecoderSettings::class
                    ]
                ],

                'UnicodeToPunycode' => [
                    'name' => 'unicode-to-punycode',

                    'settings' => UnicodeToPunycodeSettings::class,
                    'view' => 'modules.tools.unicode-to-punycode.view',
                    'templates' => [
                        'header' => 'modules.tools.unicode-to-punycode.header',
                        'selector' => 'modules.tools.unicode-to-punycode.selector',
                    ],

                    'scripts' => [
                        [ 'js/punycode.js', 'internal' ],
                    ],

                    'admin' => [
                        'title' => 'Unicode to Punycode',
                        'summary' => 'Convert Unicode to Punycode',
                        'settings-page' => ManageUnicodeToPunycodeSettings::class
                    ]
                ],

                'PunycodeToUnicode' => [
                    'name' => 'punycode-to-unicode',

                    'settings' => PunycodeToUnicodeSettings::class,

                    'view' => 'modules.tools.punycode-to-unicode.view',
                    'templates' => [
                        'header' => 'modules.tools.punycode-to-unicode.header',
                        'selector' => 'modules.tools.punycode-to-unicode.selector',
                    ],

                    'scripts' => [
                        [ 'js/punycode.js', 'internal' ],
                    ],

                    'admin' => [
                        'title' => 'Punycode to Unicode',
                        'summary' => 'Convert Punycode to Unicode',
                        'settings-page' => ManagePunycodeToUnicodeSettings::class
                    ]
                ],

                'JPGToPNG' => [
                    'name' => 'jpg-to-png',

                    'settings' => JPGToPNGSettings::class,

                    'view' => 'modules.tools.jpg-to-png.view',
                    'templates' => [
                        'header' => 'modules.tools.jpg-to-png.header',
                        'selector' => 'modules.tools.jpg-to-png.selector',
                    ],

                    'admin' => [
                        'title' => 'JPG To PNG',
                        'summary' => 'Convert JPG to PNG',
                        'settings-page' => ManageJPGToPNGSettings::class
                    ]
                ],

                'JPGToWEBP' => [
                    'name' => 'jpg-to-webp',

                    'settings' => JPGToWEBPSettings::class,

                    'view' => 'modules.tools.jpg-to-webp.view',
                    'templates' => [
                        'header' => 'modules.tools.jpg-to-webp.header',
                        'selector' => 'modules.tools.jpg-to-webp.selector',
                    ],

                    'admin' => [
                        'title' => 'JPG To WEBP',
                        'summary' => 'Convert JPG to WEBP',
                        'settings-page' => ManageJPGToWEBPSettings::class
                    ]
                ],

                'PNGToJPG' => [
                    'name' => 'png-to-jpg',

                    'settings' => PNGToJPGSettings::class,

                    'view' => 'modules.tools.png-to-jpg.view',
                    'templates' => [
                        'header' => 'modules.tools.png-to-jpg.header',
                        'selector' => 'modules.tools.png-to-jpg.selector',
                    ],

                    'admin' => [
                        'title' => 'PNG to JPG',
                        'summary' => 'Convert PNG to JPG',
                        'settings-page' => ManagePNGToJPGSettings::class
                    ]
                ],

                'PNGToWEBP' => [
                    'name' => 'png-to-webp',

                    'settings' => PNGToWEBPSettings::class,

                    'view' => 'modules.tools.png-to-webp.view',
                    'templates' => [
                        'header' => 'modules.tools.png-to-webp.header',
                        'selector' => 'modules.tools.png-to-webp.selector',
                    ],

                    'admin' => [
                        'title' => 'PNG to WEBP',
                        'summary' => 'Convert PNG to WEBP',
                        'settings-page' => ManagePNGToWEBPSettings::class
                    ]
                ],

                'WEBPToJPG' => [
                    'name' => 'webp-to-jpg',

                    'settings' => WEBPToJPGSettings::class,

                    'view' => 'modules.tools.webp-to-jpg.view',
                    'templates' => [
                        'header' => 'modules.tools.webp-to-jpg.header',
                        'selector' => 'modules.tools.webp-to-jpg.selector',
                    ],

                    'admin' => [
                        'title' => 'WEBP to JPG',
                        'summary' => 'Convert WEBP to JPG',
                        'settings-page' => ManageWEBPToJPGSettings::class
                    ]
                ],

                'WEBPToPNG' => [
                    'name' => 'webp-to-png',

                    'settings' => WEBPToPNGSettings::class,

                    'view' => 'modules.tools.webp-to-png.view',
                    'templates' => [
                        'header' => 'modules.tools.webp-to-png.header',
                        'selector' => 'modules.tools.webp-to-png.selector',
                    ],

                    'admin' => [
                        'title' => 'WEBP to PNG',
                        'summary' => 'Convert WEBP to PNG',
                        'settings-page' => ManageWEBPToPNGSettings::class
                    ]
                ],

                'ImageCompressor' => [
                    'name' => 'image-compressor',

                    'settings' => ImageCompressorSettings::class,

                    'view' => 'modules.tools.image-compressor.view',
                    'templates' => [
                        'header' => 'modules.tools.image-compressor.header',
                        'selector' => 'modules.tools.image-compressor.selector',
                    ],

                    'admin' => [
                        'title' => 'Image Compressor',
                        'summary' => 'Compress an Image',
                        'settings-page' => ManageImageCompressorSettings::class
                    ]
                ],

                'ImageResizer' => [
                    'name' => 'image-resizer',

                    'settings' => ImageResizerSettings::class,

                    'view' => 'modules.tools.image-resizer.view',
                    'templates' => [
                        'header' => 'modules.tools.image-resizer.header',
                        'selector' => 'modules.tools.image-resizer.selector',
                    ],

                    'admin' => [
                        'title' => 'Image Resizer',
                        'summary' => 'Resize an Image',
                        'settings-page' => ManageImageResizerSettings::class
                    ]
                ],

                'MemoryStorageConverter' => [
                    'name' => 'memory-storage-converter',

                    'settings' => MemoryStorageConverterSettings::class,

                    'view' => 'modules.tools.memory-storage-converter.view',
                    'templates' => [
                        'header' => 'modules.tools.memory-storage-converter.header',
                        'selector' => 'modules.tools.memory-storage-converter.selector',
                    ],

                    'scripts' => [
                        [ 'js/converters.js', 'internal' ]
                    ],

                    'admin' => [
                        'title' => 'Memory / Storage Converter',
                        'summary' => 'Convert between data storage units.',
                        'settings-page' => ManageMemoryStorageConverterSettings::class
                    ]
                ]
            ]
        ],

        'Security' => [
            'view'  => 'modules.categories.security',
            'admin' => [
                'title' => 'Security'
            ],

            'tools' => [
                'PasswordGenerator' => [
                    'name' => 'password-generator',

                    'settings'  => PasswordGeneratorSettings::class,
                    'view'      => 'modules.tools.password-generator.view',

                    'templates' => [
                        'header'   => 'modules.tools.password-generator.header',
                        'selector' => 'modules.tools.password-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Password Generator',
                        'summary'       => 'Create secure passwords',
                        'settings-page' => ManagePasswordGeneratorSettings::class
                    ]
                ],

                'PasswordStrengthTest' => [
                    'name' => 'password-strength-test',

                    'settings'  => PasswordStrengthTestSettings::class,
                    'view' => 'modules.tools.password-strength-test.view',

                    'templates' => [
                        'header'   => 'modules.tools.password-strength-test.header',
                        'selector' => 'modules.tools.password-strength-test.selector'
                    ],

                    'admin' => [
                        'title'         => 'Password Strength Test',
                        'summary'       => 'Test Password Strength',
                        'settings-page' => ManagePasswordStrengthTestSettings::class
                    ]
                ],

                'MD5Generator' => [
                    'name' => 'md5-generator',

                    'settings'  => MD5GeneratorSettings::class,
                    'component' => MD5Generator::class,

                    'templates' => [
                        'header'   => 'modules.tools.md5-generator.header',
                        'selector' => 'modules.tools.md5-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'MD5 Generator',
                        'summary'       => 'Calculate MD5 Hashes',
                        'settings-page' => ManageMD5GeneratorSettings::class
                    ]
                ],

                'SHAGenerator' => [
                    'name' => 'sha-generator',

                    'settings'  => SHAGeneratorSettings::class,
                    'component' => SHAGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.sha-generator.header',
                        'selector' => 'modules.tools.sha-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'SHA Generator',
                        'summary'       => 'Calculate SHA Hashes',
                        'settings-page' => ManageSHAGeneratorSettings::class
                    ]
                ],

                'BcryptGenerator' => [
                    'name' => 'bcrypt-generator',

                    'settings'  => BcryptGeneratorSettings::class,
                    'component' => BcryptGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.bcrypt-generator.header',
                        'selector' => 'modules.tools.bcrypt-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Bcrypt Generator',
                        'summary'       => 'Calculate Bcrypt Hashes',
                        'settings-page' => ManageBcryptGeneratorSettings::class
                    ]
                ],

                'HashGenerator' => [
                    'name' => 'hash-generator',

                    'settings'  => HashGeneratorSettings::class,
                    'component' => HashGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.hash-generator.header',
                        'selector' => 'modules.tools.hash-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Hash Generator',
                        'summary'       => 'Generate different hashes.',
                        'settings-page' => ManageHashGeneratorSettings::class
                    ]
                ],

                'CreditCardValidator' => [
                    'name' => 'credit-card-validator',

                    'settings' => CreditCardValidatorSettings::class,
                    'view' => 'modules.tools.credit-card-validator.view',
                    'templates' => [
                        'header' => 'modules.tools.credit-card-validator.header',
                        'selector' => 'modules.tools.credit-card-validator.selector',
                    ],

                    'scripts' => [
                        [ 'js/cards.js', 'internal' ],
                    ],

                    'admin' => [
                        'title' => 'Credit Card Validator',
                        'summary' => 'Validate Card Details online',
                        'settings-page' => ManageCreditCardValidatorSettings::class
                    ]
                ]
            ]
        ],

        'Content' => [
            'view'  => 'modules.categories.content',
            'admin' => [
                'title' => 'Content'
            ],

            'tools' => [
                'WordCount' => [
                    'name' => 'word-count',

                    'settings'  => WordCountSettings::class,
                    'view' => 'modules.tools.word-count.view',

                    'templates' => [
                        'header'   => 'modules.tools.word-count.header',
                        'selector' => 'modules.tools.word-count.selector'
                    ],

                    'admin' => [
                        'title'         => 'Word Count',
                        'summary'       => 'Count the Words and Letters',
                        'settings-page' => ManageWordCountSettings::class
                    ]
                ],

                'LoremIpsumGenerator' => [
                    'name' => 'lorem-ipsum-generator',

                    'settings'  => LoremIpsumGeneratorSettings::class,
                    'view' => 'modules.tools.lorem-ipsum-generator.view',

                    'scripts' => [ [ 'js/lipsum.js', 'internal' ] ],

                    'templates' => [
                        'header'   => 'modules.tools.lorem-ipsum-generator.header',
                        'selector' => 'modules.tools.lorem-ipsum-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Lorem Ipsum Generator',
                        'summary'       => 'Generate placeholder text.',
                        'settings-page' => ManageLoremIpsumGeneratorSettings::class
                    ]
                ],

                'TextSeparator' => [
                    'name' => 'text-separator',

                    'settings'  => TextSeparatorSettings::class,
                    'view' => 'modules.tools.text-separator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.text-separator.header',
                        'selector' => 'modules.tools.text-separator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Text Separator',
                        'summary'       => 'Separate Text based on any metric.',
                        'settings-page' => ManageTextSeparatorSettings::class
                    ]
                ],

                'DuplicateLinesRemover' => [
                    'name' => 'duplicate-lines-remover',

                    'settings'  => DuplicateLinesRemoverSettings::class,
                    'view' => 'modules.tools.duplicate-lines-remover.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.duplicate-lines-remover.header',
                        'selector' => 'modules.tools.duplicate-lines-remover.selector'
                    ],

                    'admin' => [
                        'title'         => 'Duplicate Lines Remover',
                        'summary'       => 'Remove Duplicate lines from text',
                        'settings-page' => ManageDuplicateLinesRemoverSettings::class
                    ]
                ],

                'LineBreakRemover' => [
                    'name' => 'line-break-remover',

                    'settings'  => LineBreakRemoverSettings::class,
                    'view' => 'modules.tools.line-break-remover.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.line-break-remover.header',
                        'selector' => 'modules.tools.line-break-remover.selector'
                    ],

                    'admin' => [
                        'title'         => 'Line Break Remover',
                        'summary'       => 'Remove line break from text',
                        'settings-page' => ManageLineBreakRemoverSettings::class
                    ]
                ],

                'EmailExtractor' => [
                    'name' => 'email-extractor',

                    'settings'  => EmailExtractorSettings::class,
                    'view' => 'modules.tools.email-extractor.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.email-extractor.header',
                        'selector' => 'modules.tools.email-extractor.selector'
                    ],

                    'admin' => [
                        'title'         => 'Email Extractor',
                        'summary'       => 'Extract Emails from Text',
                        'settings-page' => ManageEmailExtractorSettings::class
                    ]
                ],

                'URLExtractor' => [
                    'name' => 'url-extractor',

                    'settings'  => URLExtractorSettings::class,
                    'view' => 'modules.tools.url-extractor.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.url-extractor.header',
                        'selector' => 'modules.tools.url-extractor.selector'
                    ],

                    'admin' => [
                        'title'         => 'URL Extractor',
                        'summary'       => 'Extract URLs from Text',
                        'settings-page' => ManageURLExtractorSettings::class
                    ]
                ],

                'SEOTagsGenerator' => [
                    'name' => 'seo-tags-generator',

                    'settings'  => SEOTagsGeneratorSettings::class,
                    'view' => 'modules.tools.seo-tags-generator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/seotags.js', 'internal' ],
                        [ 'https://unpkg.com/codeflask/build/codeflask.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.seo-tags-generator.header',
                        'selector' => 'modules.tools.seo-tags-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'SEO Tags Generator',
                        'summary'       => 'Generate SEO & OpenGraph tags.',
                        'settings-page' => ManageSEOTagsGeneratorSettings::class
                    ]
                ],

                'TwitterCardGenerator' => [
                    'name' => 'twitter-card-generator',

                    'settings'  => TwitterCardGeneratorSettings::class,
                    'view' => 'modules.tools.twitter-card-generator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/seotags.js', 'internal' ],
                        [ 'https://unpkg.com/codeflask/build/codeflask.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.twitter-card-generator.header',
                        'selector' => 'modules.tools.twitter-card-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Twitter Card Generator',
                        'summary'       => 'Generate Twitter Embed Cards.',
                        'settings-page' => ManageTwitterCardGeneratorSettings::class
                    ]
                ],

                'HTMLEntityEncode' => [
                    'name' => 'html-entity-encode',

                    'settings'  => HTMLEntityEncodeSettings::class,
                    'view' => 'modules.tools.html-entity-encode.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.html-entity-encode.header',
                        'selector' => 'modules.tools.html-entity-encode.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML Entity Encode',
                        'summary'       => 'Encode HTML into HTML Entities.',
                        'settings-page' => ManageHTMLEntityEncodeSettings::class
                    ]
                ],

                'HTMLEntityDecode' => [
                    'name' => 'html-entity-decode',

                    'settings'  => HTMLEntityDecodeSettings::class,
                    'view' => 'modules.tools.html-entity-decode.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.html-entity-decode.header',
                        'selector' => 'modules.tools.html-entity-decode.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML Entity Decode',
                        'summary'       => 'Decode HTML into HTML Entities.',
                        'settings-page' => ManageHTMLEntityDecodeSettings::class
                    ]
                ],

                'HTMLTagsStripper' => [
                    'name' => 'html-tags-stripper',

                    'settings'  => HTMLTagsStripperSettings::class,

                    'view' => 'modules.tools.html-tags-stripper.view',
                    'templates' => [
                        'header'   => 'modules.tools.html-tags-stripper.header',
                        'selector' => 'modules.tools.html-tags-stripper.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML Tags Stripper',
                        'summary'       => 'Get rid of HTML Tags',
                        'settings-page' => ManageHTMLTagsStripperSettings::class
                    ]
                ],

                'HTMLMinifier' => [
                    'name' => 'html-minifier',

                    'settings'  => HTMLMinifierSettings::class,
                    'view' => 'modules.tools.html-minifier.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/htmlminifier.min.js', 'internal' ],
                        [ 'js/formatters.js',       'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-html.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.html-minifier.header',
                        'selector' => 'modules.tools.html-minifier.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML Minifier',
                        'summary'       => 'Minify HTML Code',
                        'settings-page' => ManageHTMLMinifierSettings::class
                    ]
                ],

                'CSSMinifier' => [
                    'name' => 'css-minifier',

                    'settings'  => CSSMinifierSettings::class,
                    'view' => 'modules.tools.css-minifier.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/htmlminifier.min.js', 'internal' ],
                        [ 'js/formatters.js',       'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-css.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.css-minifier.header',
                        'selector' => 'modules.tools.css-minifier.selector'
                    ],

                    'admin' => [
                        'title'         => 'CSS Minifier',
                        'summary'       => 'Minify CSS Code',
                        'settings-page' => ManageCSSMinifierSettings::class
                    ]
                ],

                'JSMinifier' => [
                    'name' => 'js-minifier',

                    'settings'  => JSMinifierSettings::class,
                    'view' => 'modules.tools.js-minifier.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        // [ 'js/htmlminifier.min.js', 'internal' ],

                        [ 'js/formatters.js',       'internal' ],

                        [ 'js/uglify/minify.js', 'internal' ],
                        [ 'js/uglify/utils.js', 'internal' ],
                        [ 'js/uglify/ast.js', 'internal' ],
                        [ 'js/uglify/parse.js', 'internal' ],
                        [ 'js/uglify/transform.js', 'internal' ],
                        [ 'js/uglify/scope.js', 'internal' ],
                        [ 'js/uglify/output.js', 'internal' ],
                        [ 'js/uglify/compress.js', 'internal' ],
                        [ 'js/uglify/propmangle.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-javascript.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.js-minifier.header',
                        'selector' => 'modules.tools.js-minifier.selector'
                    ],

                    'admin' => [
                        'title'         => 'JS Minifier',
                        'summary'       => 'Minify JS Code',
                        'settings-page' => ManageJSMinifierSettings::class
                    ]
                ],

                'HTMLFormatter' => [
                    'name' => 'html-formatter',

                    'settings'  => HTMLFormatterSettings::class,
                    'view' => 'modules.tools.html-formatter.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/formatters.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-html.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify.min.js',      'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-css.min.js',  'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-html.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.html-formatter.header',
                        'selector' => 'modules.tools.html-formatter.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTML Formatter',
                        'summary'       => 'Format HTML Code',
                        'settings-page' => ManageHTMLFormatterSettings::class
                    ]
                ],

                'CSSFormatter' => [
                    'name' => 'css-formatter',

                    'settings'  => CSSFormatterSettings::class,
                    'view' => 'modules.tools.css-formatter.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/formatters.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-css.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify.min.js',      'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-css.min.js',  'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-html.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.css-formatter.header',
                        'selector' => 'modules.tools.css-formatter.selector'
                    ],

                    'admin' => [
                        'title'         => 'CSS Formatter',
                        'summary'       => 'Format CSS Code',
                        'settings-page' => ManageCSSFormatterSettings::class
                    ]
                ],

                'JSFormatter' => [
                    'name' => 'js-formatter',

                    'settings'  => JSFormatterSettings::class,
                    'view' => 'modules.tools.js-formatter.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/formatters.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-javascript.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify.min.js',      'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-css.min.js',  'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.4/beautify-html.min.js', 'external' ]
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.js-formatter.header',
                        'selector' => 'modules.tools.js-formatter.selector'
                    ],

                    'admin' => [
                        'title'         => 'JS Formatter',
                        'summary'       => 'Format JS Code',
                        'settings-page' => ManageJSFormatterSettings::class
                    ]
                ],

                'JSObfuscator' => [
                    'name' => 'js-obfuscator',

                    'settings'  => JSObfuscatorSettings::class,
                    'view' => 'modules.tools.js-obfuscator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/formatters.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-javascript.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://cdn.jsdelivr.net/npm/javascript-obfuscator/dist/index.browser.js',      'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.js-obfuscator.header',
                        'selector' => 'modules.tools.js-obfuscator.selector'
                    ],

                    'admin' => [
                        'title'         => 'JS Obfuscator',
                        'summary'       => 'Obfuscate JS Code',
                        'settings-page' => ManageJSObfuscatorSettings::class
                    ]
                ],

                'SQLBeautifier' => [
                    'name' => 'sql-beautifier',

                    'settings'  => SQLBeautifierSettings::class,
                    'view' => 'modules.tools.sql-beautifier.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'js/formatters.js', 'internal' ],

                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/mode-javascript.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],

                        [ 'https://unpkg.com/sql-formatter@2.3.3/dist/sql-formatter.min.js',      'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.sql-beautifier.header',
                        'selector' => 'modules.tools.sql-beautifier.selector'
                    ],

                    'admin' => [
                        'title'         => 'SQL Beautifier',
                        'summary'       => 'Format SQL Queries',
                        'settings-page' => ManageSQLBeautifierSettings::class
                    ]
                ],

                'PrivacyPolicyGenerator' => [
                    'name' => 'privacy-policy-generator',

                    'settings'  => PrivacyPolicyGeneratorSettings::class,
                    'component' => PrivacyPolicyGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.privacy-policy-generator.header',
                        'selector' => 'modules.tools.privacy-policy-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Privacy Policy Generator',
                        'summary'       => 'Generate Privacy Policy Pages',
                        'settings-page' => ManagePrivacyPolicyGeneratorSettings::class
                    ]
                ],

                'TermsOfServiceGenerator' => [
                    'name' => 'terms-of-service-generator',

                    'settings'  => TermsOfServiceGeneratorSettings::class,
                    'component' => TermsOfServiceGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.terms-of-service-generator.header',
                        'selector' => 'modules.tools.terms-of-service-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Terms of Service Generator',
                        'summary'       => 'Generate Terms of Service Pages',
                        'settings-page' => ManageTermsOfServiceGeneratorSettings::class
                    ]
                ],

                'RobotstxtGenerator' => [
                    'name' => 'robotstxt-generator',

                    'settings'  => RobotstxtGeneratorSettings::class,
                    'view' => 'modules.tools.robotstxt-generator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.robotstxt-generator.header',
                        'selector' => 'modules.tools.robotstxt-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Robots.txt Generator',
                        'summary'       => 'Generate Robots.txt Files',
                        'settings-page' => ManageRobotstxtGeneratorSettings::class
                    ]
                ],

                'HTACCESSRedirectGenerator' => [
                    'name' => 'htaccess-redirect-generator',

                    'settings'  => HTACCESSRedirectGeneratorSettings::class,
                    'view' => 'modules.tools.htaccess-redirect-generator.view',

                    'styles' => [
                        [ 'css/ace-custom.css', 'internal' ]
                    ],

                    'scripts' => [
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/ace.min.js', 'external' ],
                        [ 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.8.1/theme-clouds.min.js', 'external' ],
                    ],

                    'templates' => [
                        'header'   => 'modules.tools.htaccess-redirect-generator.header',
                        'selector' => 'modules.tools.htaccess-redirect-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTACCESS Redirect Generator',
                        'summary'       => 'Generate HTACESS Redirects Files',
                        'settings-page' => ManageHTACCESSRedirectGeneratorSettings::class
                    ]
                ],

                'SourceCodeDownloader' => [
                    'name' => 'source-code-downloader',

                    'settings'  => SourceCodeDownloaderSettings::class,

                    'component' => SourceCodeDownloader::class,
                    'templates' => [
                        'header'   => 'modules.tools.source-code-downloader.header',
                        'selector' => 'modules.tools.source-code-downloader.selector'
                    ],

                    'admin' => [
                        'title'         => 'Source Code Downloader',
                        'summary'       => 'Download a webpage\'s source-code.',
                        'settings-page' => ManageSourceCodeDownloaderSettings::class
                    ]
                ],

                'TextReplacer' => [
                    'name' => 'text-replacer',

                    'settings' => TextReplacerSettings::class,
                    'view' => 'modules.tools.text-replacer.view',
                    'templates' => [
                        'header' => 'modules.tools.text-replacer.header',
                        'selector' => 'modules.tools.text-replacer.selector',
                    ],

                    'admin' => [
                        'title' => 'Text Replacer',
                        'summary' => 'Replace text in subject.',
                        'settings-page' => ManageTextReplacerSettings::class
                    ]
                ],

                'TextReverser' => [
                    'name' => 'text-reverser',

                    'settings' => TextReverserSettings::class,
                    'view' => 'modules.tools.text-reverser.view',
                    'templates' => [
                        'header' => 'modules.tools.text-reverser.header',
                        'selector' => 'modules.tools.text-reverser.selector',
                    ],

                    'admin' => [
                        'title' => 'Text Reverser',
                        'summary' => 'Reverse text.',
                        'settings-page' => ManageTextReverserSettings::class
                    ]
                ],

                'WordDensityCounter' => [
                    'name' => 'word-density-counter',

                    'settings' => WordDensityCounterSettings::class,
                    'view' => 'modules.tools.word-density-counter.view',
                    'templates' => [
                        'header' => 'modules.tools.word-density-counter.header',
                        'selector' => 'modules.tools.word-density-counter.selector',
                    ],

                    'admin' => [
                        'title' => 'Word Density Counter',
                        'summary' => 'Count Density of Words',
                        'settings-page' => ManageWordDensityCounterSettings::class
                    ]
                ],

                'PalindromeChecker' => [
                    'name' => 'palindrome-checker',

                    'settings' => PalindromeCheckerSettings::class,
                    'view' => 'modules.tools.palindrome-checker.view',
                    'templates' => [
                        'header' => 'modules.tools.palindrome-checker.header',
                        'selector' => 'modules.tools.palindrome-checker.selector',
                    ],

                    'admin' => [
                        'title' => 'Palindrome Checker',
                        'summary' => 'Check if String is Palindrome',
                        'settings-page' => ManagePalindromeCheckerSettings::class
                    ]
                ],

                'CaseConverter' => [
                    'name' => 'case-converter',

                    'settings' => CaseConverterSettings::class,
                    'view' => 'modules.tools.case-converter.view',
                    'templates' => [
                        'header' => 'modules.tools.case-converter.header',
                        'selector' => 'modules.tools.case-converter.selector',
                    ],

                    'admin' => [
                        'title' => 'Case Converter',
                        'summary' => 'Convert Case of Text',
                        'settings-page' => ManageCaseConverterSettings::class
                    ]
                ],

                'TextToSlug' => [
                    'name' => 'text-to-slug',

                    'settings' => TextToSlugSettings::class,
                    'view' => 'modules.tools.text-to-slug.view',
                    'templates' => [
                        'header' => 'modules.tools.text-to-slug.header',
                        'selector' => 'modules.tools.text-to-slug.selector',
                    ],

                    'admin' => [
                        'title' => 'Text to Slug',
                        'summary' => 'Convert Text to Slugs',
                        'settings-page' => ManageTextToSlugSettings::class
                    ]
                ],

                'RandomTextLine' => [
                    'name' => 'random-text-line',

                    'settings'  => RandomTextLineSettings::class,
                    'view'      => 'modules.tools.random-text-line.view',

                    'templates' => [
                        'header'   => 'modules.tools.random-text-line.header',
                        'selector' => 'modules.tools.random-text-line.selector'
                    ],

                    'admin' => [
                        'title'         => 'Randomize / Shuffle Text Lines',
                        'summary'       => 'This online tool randomizes / shuffle text lines provided as input. Get the random lines.',
                        'settings-page' => ManageRandomTextLineSettings::class
                    ]
                ],

                'QuotedPrintableEncode' => [
                    'name' => 'quoted-printable-encode',

                    'settings'  => QuotedPrintableEncodeSettings::class,
                    'controller' => QuotedPrintableEncodeController::class,

                    'templates' => [
                        'header'   => 'modules.tools.quoted-printable-encode.header',
                        'selector' => 'modules.tools.quoted-printable-encode.selector'
                    ],

                    'admin' => [
                        'title'         => 'Encode Quoted Printable',
                        'summary'       => 'To encode a regular text to Quoted Printable, type in the box on top and click the Encode button.',
                        'settings-page' => ManageQuotedPrintableEncodeSettings::class
                    ]
                ],

                'QuotedPrintableDecode' => [
                    'name' => 'quoted-printable-decode',

                    'settings'  => QuotedPrintableDecodeSettings::class,
                    'controller' => QuotedPrintableDecodeController::class,

                    'templates' => [
                        'header'   => 'modules.tools.quoted-printable-decode.header',
                        'selector' => 'modules.tools.quoted-printable-decode.selector'
                    ],

                    'admin' => [
                        'title'         => 'Decode Quoted Printable',
                        'summary'       => 'To decode a regular text to Quoted Printable, type in the box on top and click the Decode button.',
                        'settings-page' => ManageQuotedPrintableDecodeSettings::class
                    ]
                ]
            ]
        ],

        'Domains' => [
            'view' => 'modules.categories.domains',
            'admin' => [
                'title' => 'Domains'
            ],

            'tools' => [
                'DomainGenerator' => [
                    'name' => 'domain-generator',

                    'settings'  => DomainGeneratorSettings::class,
                    'component' => DomainGenerator::class,

                    'templates' => [
                        'header'   => 'modules.tools.domain-generator.header',
                        'selector' => 'modules.tools.domain-generator.selector'
                    ],

                    'admin' => [
                        'title'         => 'Domain Generator',
                        'summary'       => 'Generate Domain Names',
                        'settings-page' => ManageDomainGeneratorSettings::class
                    ]
                ],

                'DomainWhois' => [
                    'name' => 'domain-whois',

                    'settings'  => DomainWhoisSettings::class,
                    'component' => DomainWhois::class,

                    'templates' => [
                        'header'   => 'modules.tools.domain-whois.header',
                        'selector' => 'modules.tools.domain-whois.selector'
                    ],

                    'admin' => [
                        'title'         => 'Domain WHOIS',
                        'summary'       => 'Get WHOIS Info',
                        'settings-page' => ManageDomainWhoisSettings::class
                    ]
                ],

                'IPToHostname' => [
                    'name' => 'ip-to-hostname',

                    'settings'  => IPToHostnameSettings::class,

                    'view' => 'modules.tools.ip-to-hostname.view',
                    'templates' => [
                        'header'   => 'modules.tools.ip-to-hostname.header',
                        'selector' => 'modules.tools.ip-to-hostname.selector'
                    ],

                    'admin' => [
                        'title'         => 'IP To Hostname',
                        'summary'       => 'Get Hostname from IP',
                        'settings-page' => ManageIPToHostnameSettings::class
                    ]
                ],

                'HostnameToIP' => [
                    'name' => 'hostname-to-ip',

                    'settings'  => HostnameToIPSettings::class,
                    'component' => HostnameToIP::class,

                    'templates' => [
                        'header'   => 'modules.tools.hostname-to-ip.header',
                        'selector' => 'modules.tools.hostname-to-ip.selector'
                    ],

                    'admin' => [
                        'title'         => 'Hostname To IP',
                        'summary'       => 'Get IP from Hostname',
                        'settings-page' => ManageHostnameToIPSettings::class
                    ]
                ],

                'IPInformation' => [
                    'name' => 'ip-information',

                    'settings'  => IPInformationSettings::class,

                    'view' => 'modules.tools.ip-information.view',
                    'templates' => [
                        'header'   => 'modules.tools.ip-information.header',
                        'selector' => 'modules.tools.ip-information.selector'
                    ],

                    'admin' => [
                        'title'         => 'IP Information',
                        'summary'       => 'Obtain info about any IP',
                        'settings-page' => ManageIPInformationSettings::class
                    ]
                ],

                'HTTPStatusCodeChecker' => [
                    'name' => 'http-status-code-checker',

                    'settings'  => HTTPStatusCodeCheckerSettings::class,
                    'component' => HTTPStatusCodeChecker::class,

                    'templates' => [
                        'header'   => 'modules.tools.http-status-code-checker.header',
                        'selector' => 'modules.tools.http-status-code-checker.selector'
                    ],

                    'admin' => [
                        'title'         => 'HTTP Status Code Checker',
                        'summary'       => 'Determine Status Codes from URLs',
                        'settings-page' => ManageHTTPStatusCodeCheckerSettings::class
                    ]
                ],

                'URLParser' => [
                    'name' => 'url-parser',

                    'settings' => URLParserSettings::class,

                    'view' => 'modules.tools.url-parser.view',
                    'templates' => [
                        'header' => 'modules.tools.url-parser.header',
                        'selector' => 'modules.tools.url-parser.selector',
                    ],

                    'admin' => [
                        'title' => 'URL Parser',
                        'summary' => 'Parse any URL',
                        'settings-page' => ManageURLParserSettings::class
                    ]
                ],

                'DnsLookup' => [
                    'name' => 'dns-lookup',

                    'settings'  => DnsLookupSettings::class,
                    'view' => 'modules.tools.dns-lookup.view',

                    'templates' => [
                        'header'   => 'modules.tools.dns-lookup.header',
                        'selector' => 'modules.tools.dns-lookup.selector'
                    ],

                    'admin' => [
                        'title'         => 'Dns Lookup',
                        'summary'       => 'Online dnslookup is a web based DNS client that queries DNS records for a given domain name.',
                        'settings-page' => ManageDnsLookupSettings::class
                    ]
                ],

                'WhatsMyBrowser' => [
                    'name' => 'whats-my-browser',

                    'settings'  => WhatsMyBrowserSettings::class,
                    'controller' => WhatsMyBrowserController::class,

                    'templates' => [
                        'header'   => 'modules.tools.whats-my-browser.header',
                        'selector' => 'modules.tools.whats-my-browser.selector'
                    ],

                    'admin' => [
                        'title'         => 'What is My Browser',
                        'summary'       => 'What browser do I have? Find out my browser.',
                        'settings-page' => ManageWhatsMyBrowserSettings::class
                    ]
                ],

                'OpenPortChecker' => [
                    'name' => 'open-port-checker',

                    'settings'  => OpenPortCheckerSettings::class,
                    'controller' => OpenPortCheckerController::class,

                    'templates' => [
                        'header'   => 'modules.tools.open-port-checker.header',
                        'selector' => 'modules.tools.open-port-checker.selector'
                    ],

                    'admin' => [
                        'title'         => 'Open Port Checker',
                        'summary'       => 'The open port checker is a tool you can use to check your external IP address and detect open ports on your connection.',
                        'settings-page' => ManageOpenPortCheckerSettings::class
                    ]
                ],

                'BmiCalculator' => [
                    'name' => 'bmi-calculator',

                    'settings'  => BmiCalculatorSettings::class,
                    'controller' => BmiCalculatorController::class,

                    'templates' => [
                        'header'   => 'modules.tools.bmi-calculator.header',
                        'selector' => 'modules.tools.bmi-calculator.selector'
                    ],

                    'admin' => [
                        'title'         => 'BMI Calculator',
                        'summary'       => 'Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult men and women.',
                        'settings-page' => ManageBmiCalculatorSettings::class
                    ]
                ],

                'SmtpTest' => [
                    'name' => 'smtp-test',

                    'settings'  => SmtpTestSettings::class,
                    'controller' => SmtpTestController::class,

                    'templates' => [
                        'header'   => 'modules.tools.smtp-test.header',
                        'selector' => 'modules.tools.smtp-test.selector'
                    ],

                    'admin' => [
                        'title'         => 'Online SMTP Test',
                        'summary'       => 'Free advanced online tool to Test and check your SMTP server.',
                        'settings-page' => ManageSmtpTestSettings::class
                    ]
                ],

                'GzipTest' => [
                    'name' => 'gzip-test',

                    'settings'  => GzipTestSettings::class,
                    'controller' => GzipTestController::class,

                    'templates' => [
                        'header'   => 'modules.tools.gzip-test.header',
                        'selector' => 'modules.tools.gzip-test.selector'
                    ],

                    'admin' => [
                        'title'         => 'GZIP Compression Test',
                        'summary'       => 'Test if Gzip is working on your website.',
                        'settings-page' => ManageGzipTestSettings::class
                    ]
                ],
            ]
        ],
    ]
];
