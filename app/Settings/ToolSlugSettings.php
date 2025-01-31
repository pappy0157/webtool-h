<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ToolSlugSettings extends Settings {
    public ?string $WebsiteStatusChecker;
    public ?string $UserAgentFinder;
    public ?string $WhatsMyIp;
    public ?string $WordCount;
    public ?string $TextToBinary;
    public ?string $BinaryToText;
    public ?string $LoremIpsumGenerator;
    public ?string $SEOTagsGenerator;
    public ?string $HTMLMinifier;
    public ?string $HTMLFormatter;
    public ?string $CSSMinifier;
    public ?string $JSMinifier;
    public ?string $CSSFormatter;
    public ?string $JSFormatter;
    public ?string $MD5Generator;
    public ?string $SHAGenerator;
    public ?string $ImageToBase64;
    public ?string $JSObfuscator;
    public ?string $URLEncoder;
    public ?string $URLDecoder;
    public ?string $URLUnshortener;
    public ?string $SSLChecker;
    public ?string $TimestampConverter;
    public ?string $QRGenerator;
    public ?string $PasswordGenerator;
    public ?string $HashGenerator;
    public ?string $Ping;
    public ?string $TextToBase64;
    public ?string $QRCodeReader;
    public ?string $DomainGenerator;
    public ?string $DomainWhois;
    public ?string $IPToHostname;
    public ?string $HostnameToIP;
    public ?string $RGBToHex;
    public ?string $HexToRGB;
    public ?string $HTTPHeadersParser;
    public ?string $HTMLTagsStripper;
    public ?string $MarkdownToHTML;
    public ?string $HTMLToMarkdown;
    public ?string $DuplicateLinesRemover;
    public ?string $TextSeparator;
    public ?string $HTMLEntityEncode;
    public ?string $HTMLEntityDecode;
    public ?string $CSVToJSON;
    public ?string $JSONToCSV;
    public ?string $UUIDv4Generator;
    public ?string $BcryptGenerator;
    public ?string $HTTPStatusCodeChecker;
    public ?string $LineBreakRemover;
    public ?string $EmailExtractor;
    public ?string $URLExtractor;
    public ?string $YouTubeThumbnailDownloader;
    public ?string $IPInformation;
    public ?string $SQLBeautifier;
    public ?string $PasswordStrengthTest;
    public ?string $RobotstxtGenerator;
    public ?string $HTACCESSRedirectGenerator;
    public ?string $PrivacyPolicyGenerator;
    public ?string $TermsOfServiceGenerator;
    public ?string $EmailValidator;
    public ?string $SourceCodeDownloader;
    public ?string $MemoryStorageConverter;
    public ?string $CreditCardValidator;
    public ?string $TwitterCardGenerator;
    public ?string $TextReplacer;
    public ?string $CaseConverter;
    public ?string $WordDensityCounter;
    public ?string $TextToSlug;
    public ?string $TextReverser;
    public ?string $RandomNumberGenerator;
    public ?string $RedirectChecker;
    public ?string $PalindromeChecker;
    public ?string $ROT13Encoder;
    public ?string $ImageResizer;
    public ?string $ImageCompressor;
    public ?string $JPGToPNG;
    public ?string $PNGToJPG;
    public ?string $WEBPToPNG;
    public ?string $WEBPToJPG;
    public ?string $PNGToWEBP;
    public ?string $JPGToWEBP;
    public ?string $FakeNameGenerator;
    public ?string $ROT13Decoder;
    public ?string $PunycodeToUnicode;
    public ?string $UnicodeToPunycode;
    public ?string $URLParser;

    public ?string $Base64ToText;

public ?string $DnsLookup;

public ?string $WhatsMyBrowser;

public ?string $JsonToXml;

public ?string $OpenPortChecker;

public ?string $JsonBeautifier;

public ?string $JsonValidator;

public ?string $BmiCalculator;

public ?string $SmtpTest;

public ?string $GzipTest;

public ?string $RandomTextLine;

public ?string $QuotedPrintableEncode;

public ?string $QuotedPrintableDecode;

public ?string $XmlToJson;

public static function group(): string {
        return 'tool-slugs';
    }
}