<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class ToolSEOFields extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add("tool-website-status-checker.metaDescription", "Website Status Checker is a useful tool that helps you check whether any website is up and running or not. You can use it to check the up-status of your own website or any other website.");
        $this->migrator->add("tool-website-status-checker.metaKeywords", "");
        
        $this->migrator->add("tool-user-agent-finder.metaDescription", "User Agent Finder is a useful tool that helps you easily find the user agent for your browser.");
        $this->migrator->add("tool-user-agent-finder.metaKeywords", "");
        
        $this->migrator->add("tool-whats-my-ip.metaDescription", "Whats My IP is a useful tool that helps you easily find your IP address.");
        $this->migrator->add("tool-whats-my-ip.metaKeywords", "");
        
        $this->migrator->add("tool-ping.metaDescription", "Ping any web server and measure the latency. The latency is the total time elapsed for the Client and the Server to send and receive data from each other. Simply type in your Address and click on the button.");
        $this->migrator->add("tool-ping.metaKeywords", "");
        
        $this->migrator->add("tool-url-unshortener.metaDescription", "URL Unshortener is a useful tool that allows you to unshorten a URL / Link that has been shortened by URL shortening services. This method will not work for services that have a delay before the original location.");
        $this->migrator->add("tool-url-unshortener.metaKeywords", "");
        
        $this->migrator->add("tool-url-encoder.metaDescription", "URL Encoder is a useful tool that allows you to encode your URLs / Links to make them safe for transmission over the internet. URLs can be transferred over the internet only in the ASCII character-set. URL Encoder makes sure your URL is safe for transmission.");
        $this->migrator->add("tool-url-encoder.metaKeywords", "");
        
        $this->migrator->add("tool-url-decoder.metaDescription", "URL Decoder is a useful tool that allows you to decode your URLs / Links. URL Encoding is a technique that makes links safe to be transmitted over the internet by using the ASCII character-set. URL Decoder allows you to revert encoded URLs to their original form.");
        $this->migrator->add("tool-url-decoder.metaKeywords", "");
        
        $this->migrator->add("tool-ssl-checker.metaDescription", "SSL Checker is a useful tool that allows you to check if the SSL Certificate of any website is valid.");
        $this->migrator->add("tool-ssl-checker.metaKeywords", "");
        
        $this->migrator->add("tool-qr-generator.metaDescription", "QR Code Generator allows you to generate QR Codes based on any data. There is no limit to how many QR codes you can create. QR Codes are a very popular method of storing data in images that are easy to scan by phones / code scanners.");
        $this->migrator->add("tool-qr-generator.metaKeywords", "");
        
        $this->migrator->add("tool-qr-code-reader.metaDescription", "QR Code Reader allows you to read QR code data based on any image. Simply upload or specify the URL of the image to read the code.");
        $this->migrator->add("tool-qr-code-reader.metaKeywords", "");
        
        $this->migrator->add("tool-http-headers-parser.metaDescription", "HTTP Headers Parser is a useful tool that allows you to view the HTTP Headers of any URL and Parse them. Type in any URL and click on the parse button to check the headers.");
        $this->migrator->add("tool-http-headers-parser.metaKeywords", "");
        
        $this->migrator->add("tool-rgb-to-hex.metaDescription", "RGB To Hex is a useful tool that allows you to convert RGB Colors to Hex. Just type in your RGB Color and Click on the Button to convert to hex.");
        $this->migrator->add("tool-rgb-to-hex.metaKeywords", "");
        
        $this->migrator->add("tool-hex-to-rgb.metaDescription", "Hex To RGB is a useful tool that allows you to convert Hex Colors to RGB. Just type in your Hex Color and Click on the Button to convert to RGB.");
        $this->migrator->add("tool-hex-to-rgb.metaKeywords", "");
        
        $this->migrator->add("tool-timestamp-converter.metaDescription", "Timestamp Converter is a useful tool that allows you to convert timestamps to dates and vice versa. The UNIX timestamp is the amount of seconds passed since Jan 1st, 1970 UTC.");
        $this->migrator->add("tool-timestamp-converter.metaKeywords", "");
        
        $this->migrator->add("tool-text-to-binary.metaDescription", "Text to Binary is a useful tool that helps you easily encode text to binary. You can easily convert your text to binary for any purpose.");
        $this->migrator->add("tool-text-to-binary.metaKeywords", "");
        
        $this->migrator->add("tool-binary-to-text.metaDescription", "Binary To Text is a useful tool that helps you decode binary to text. You can easily convert your binary to text for any purpose.");
        $this->migrator->add("tool-binary-to-text.metaKeywords", "");
        
        $this->migrator->add("tool-text-to-base64.metaDescription", "Text to Base64 is a useful tool that allows you to convert text & encode them into base64 strings. Just specify the content and press the button to generate Base64 string.");
        $this->migrator->add("tool-text-to-base64.metaKeywords", "");
        
        $this->migrator->add("tool-image-to-base64.metaDescription", "Image to Base64 is a useful tool that allows you to convert images to base64 strings. Just upload the image and press the button to generate Base64 string.");
        $this->migrator->add("tool-image-to-base64.metaKeywords", "");
        
        $this->migrator->add("tool-markdown-to-html.metaDescription", "Markdown to HTML is a converter that allows you to convert your markdown format text into HTML. Markdown is a simplified format for creating documents. Paste in your Markdown format and click on the button to generate the HTML.");
        $this->migrator->add("tool-markdown-to-html.metaKeywords", "");
        
        $this->migrator->add("tool-html-to-markdown.metaDescription", "HTML to Markdown is a converter that allows you to convert your HTML documents into Markdown Format. Markdown is a simplified format for creating documents. Paste in your HTML Code and click on the button to generate the Markdown.");
        $this->migrator->add("tool-html-to-markdown.metaKeywords", "");
        
        $this->migrator->add("tool-csv-to-json.metaDescription", "CSV To JSON is a converter that lets you convert your CSV Spreadsheets into the JSON Format. CSV is a lightweight format to represent spreadsheets whereas JSON is a text-based format most popular for sending data over the internet. Paste in your CSV and Click on the Button to convert to JSON.");
        $this->migrator->add("tool-csv-to-json.metaKeywords", "");
        
        $this->migrator->add("tool-json-to-csv.metaDescription", "JSON To CSV is a converter that lets you convert your JSON into the CSV Format. CSV is a lightweight format to represent spreadsheets whereas JSON is a text-based format most popular for sending data over the internet. Paste in your JSON and Click on the Button to convert to CSV.");
        $this->migrator->add("tool-json-to-csv.metaKeywords", "");
        
        $this->migrator->add("tool-password-generator.metaDescription", "Password Generator allows you to generate passwords based on many different settings. The passwords generated by Password Generator are randomized. These passwords are also secure as they are not sent over the internet and only exist on the client's machine.");
        $this->migrator->add("tool-password-generator.metaKeywords", "");
        
        $this->migrator->add("tool-md5-generator.metaDescription", "MD5 Generator is a useful tool that allows you to generate / calculate MD5 hashes based on any string / text. Each hash generated will be unique but the same input will produce the same output.");
        $this->migrator->add("tool-md5-generator.metaKeywords", "");
        
        $this->migrator->add("tool-sha-generator.metaDescription", "SHA Generator is a useful tool that allows you to generate / calculate SHA256 or SHA512 (SHA1, SHA2) hashes based on any string / text. Each hash generated will be unique but the same input will produce the same output.");
        $this->migrator->add("tool-sha-generator.metaKeywords", "");
        
        $this->migrator->add("tool-hash-generator.metaDescription", "Password Generator allows you to generate hashes based on any data. The hashes generated by Hash Generator are calculated based on the algorithm you choose. These hashes are also secure as they are not sent over the internet and only exist on the client's machine.");
        $this->migrator->add("tool-hash-generator.metaKeywords", "");
        
        $this->migrator->add("tool-word-count.metaDescription", "Word Count is a useful tool that helps you easily find the number of individual letters and words in a piece of text.");
        $this->migrator->add("tool-word-count.metaKeywords", "");
        
        $this->migrator->add("tool-lorem-ipsum-generator.metaDescription", "Lorem Ipsum Generator is a tool that lets you generate placeholder text for your projects. You can choose how many words, sentences or paragraphs to be generated.");
        $this->migrator->add("tool-lorem-ipsum-generator.metaKeywords", "");
        
        $this->migrator->add("tool-text-separator.metaDescription", "Text Separator is a useful tool that allows you to separate a piece of text based on any character of your choice. You may separate the text by periods, quotes or any other characters. Paste your Text and Click on the Separate Button.");
        $this->migrator->add("tool-text-separator.metaKeywords", "");
        
        $this->migrator->add("tool-duplicate-lines-remover.metaDescription", "Duplicate Lines Remover is a useful tool that allows you to remoev duplicate lines from any piece of text. Make sure that each line is on a new line or separated via period. Click on the Button to remove the duplicate lines.");
        $this->migrator->add("tool-duplicate-lines-remover.metaKeywords", "");
        
        $this->migrator->add("tool-seo-tags-generator.metaDescription", "SEO & OpenGraph Tags Generator is a tool that lets you generate proper SEO & OpenGraph tags for your websites which make sure your website is indexed properly by search engines & social networks.");
        $this->migrator->add("tool-seo-tags-generator.metaKeywords", "");
        
        $this->migrator->add("tool-html-entity-encode.metaDescription", "HTML Entity Encoder is a useful tool that allows you to convert HTML Text to HTML entities. HTML Entities are safe to be sent over the internet and stored in a database. You should never send HTML over the internet unless its a trusted source. Paste in your HTML and Click on the Button to convert to HTML Entities.");
        $this->migrator->add("tool-html-entity-encode.metaKeywords", "");
        
        $this->migrator->add("tool-html-entity-decode.metaDescription", "HTML Entity Decoder is a useful tool that allows you to convert HTML Entities to HTML. HTML Entities are safe to be sent over the internet and stored in a database. You should never send HTML over the internet unless its a trusted source. Paste in your HTML Entities and Click on the Button to convert to HTML.");
        $this->migrator->add("tool-html-entity-decode.metaKeywords", "");
        
        $this->migrator->add("tool-html-tags-stripper.metaDescription", "HTML Tags Stripper is a useful tool that allows you to get rid of any HTML tags within a document. Paste your document in the text-area and click on the button to strip the HTML tags.");
        $this->migrator->add("tool-html-tags-stripper.metaKeywords", "");
        
        $this->migrator->add("tool-html-minifier.metaDescription", "HTML Minifier is a useful tool that allows you to minify your HTML Code. Minified HTML Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.");
        $this->migrator->add("tool-html-minifier.metaKeywords", "");
        
        $this->migrator->add("tool-css-minifier.metaDescription", "CSS Minifier is a useful tool that allows you to minify your CSS Code. Minified CSS Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.");
        $this->migrator->add("tool-css-minifier.metaKeywords", "");
        
        $this->migrator->add("tool-js-minifier.metaDescription", "JS Minifier is a useful tool that allows you to minify your JS Code. Minified JS Code has a smaller size and therefore it loads faster for the users. Minifying your code is recommended for a fast experience.");
        $this->migrator->add("tool-js-minifier.metaKeywords", "");
        
        $this->migrator->add("tool-html-formatter.metaDescription", "HTML Formatter is a useful tool that allows you to format HTML Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.");
        $this->migrator->add("tool-html-formatter.metaKeywords", "");
        
        $this->migrator->add("tool-css-formatter.metaDescription", "CSS Formatter is a useful tool that allows you to format CSS Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.");
        $this->migrator->add("tool-css-formatter.metaKeywords", "");
        
        $this->migrator->add("tool-js-formatter.metaDescription", "JS Formatter is a useful tool that allows you to format JS Code that is minified or unformatted. It will properly indent the code and add line breaks so that the code makes perfect sense.");
        $this->migrator->add("tool-js-formatter.metaKeywords", "");
        
        $this->migrator->add("tool-js-obfuscator.metaDescription", "JS Obfuscator is a useful tool that allows you to obfuscate your javascript code. Obfuscated code is very difficult to understand by an outsider and can make your code difficult to crack. Type in the code you want to obfuscate and press the button.");
        $this->migrator->add("tool-js-obfuscator.metaKeywords", "");
        
        $this->migrator->add("tool-domain-generator.metaDescription", "Domain Generator is a useful tool that allows you to generate .com, .net, .org, .info, .xyz, .biz domain names based on any keyword or multiple words.");
        $this->migrator->add("tool-domain-generator.metaKeywords", "");
        
        $this->migrator->add("tool-domain-whois.metaDescription", "Domain WHOIS is a useful tool that allows you to find out the WHOIS information of .com, .net, .org, .info, .xyz, .biz domain names. Just type in the domain name and click the button to view the WHOIS information.");
        $this->migrator->add("tool-domain-whois.metaKeywords", "");
        
        $this->migrator->add("tool-ip-to-hostname.metaDescription", "IP To Hostname is a useful tool that allows you to find out the hostname from an IP Address. Simply type in your IP Address and Click on the Button to find the hostname.");
        $this->migrator->add("tool-ip-to-hostname.metaKeywords", "");
        
        $this->migrator->add("tool-hostname-to-ip.metaDescription", "Hostname to IP is a useful tool that allows you to find out the IP Address from a Hostname. Just type in your Hostname and Click on the Button to find the IP Address.");
        $this->migrator->add("tool-hostname-to-ip.metaKeywords", "");
    }

    public function down(): void {
        $this->migrator->delete("tool-website-status-checker.metaDescription");
        $this->migrator->delete("tool-website-status-checker.metaKeywords");

        $this->migrator->delete("tool-user-agent-finder.metaDescription");
        $this->migrator->delete("tool-user-agent-finder.metaKeywords");

        $this->migrator->delete("tool-whats-my-ip.metaDescription");
        $this->migrator->delete("tool-whats-my-ip.metaKeywords");

        $this->migrator->delete("tool-ping.metaDescription");
        $this->migrator->delete("tool-ping.metaKeywords");

        $this->migrator->delete("tool-url-unshortener.metaDescription");
        $this->migrator->delete("tool-url-unshortener.metaKeywords");

        $this->migrator->delete("tool-url-encoder.metaDescription");
        $this->migrator->delete("tool-url-encoder.metaKeywords");

        $this->migrator->delete("tool-url-decoder.metaDescription");
        $this->migrator->delete("tool-url-decoder.metaKeywords");

        $this->migrator->delete("tool-ssl-checker.metaDescription");
        $this->migrator->delete("tool-ssl-checker.metaKeywords");

        $this->migrator->delete("tool-qr-generator.metaDescription");
        $this->migrator->delete("tool-qr-generator.metaKeywords");

        $this->migrator->delete("tool-qr-code-reader.metaDescription");
        $this->migrator->delete("tool-qr-code-reader.metaKeywords");

        $this->migrator->delete("tool-http-headers-parser.metaDescription");
        $this->migrator->delete("tool-http-headers-parser.metaKeywords");

        $this->migrator->delete("tool-rgb-to-hex.metaDescription");
        $this->migrator->delete("tool-rgb-to-hex.metaKeywords");

        $this->migrator->delete("tool-hex-to-rgb.metaDescription");
        $this->migrator->delete("tool-hex-to-rgb.metaKeywords");

        $this->migrator->delete("tool-timestamp-converter.metaDescription");
        $this->migrator->delete("tool-timestamp-converter.metaKeywords");

        $this->migrator->delete("tool-text-to-binary.metaDescription");
        $this->migrator->delete("tool-text-to-binary.metaKeywords");

        $this->migrator->delete("tool-binary-to-text.metaDescription");
        $this->migrator->delete("tool-binary-to-text.metaKeywords");

        $this->migrator->delete("tool-text-to-base64.metaDescription");
        $this->migrator->delete("tool-text-to-base64.metaKeywords");

        $this->migrator->delete("tool-image-to-base64.metaDescription");
        $this->migrator->delete("tool-image-to-base64.metaKeywords");

        $this->migrator->delete("tool-markdown-to-html.metaDescription");
        $this->migrator->delete("tool-markdown-to-html.metaKeywords");

        $this->migrator->delete("tool-html-to-markdown.metaDescription");
        $this->migrator->delete("tool-html-to-markdown.metaKeywords");

        $this->migrator->delete("tool-csv-to-json.metaDescription");
        $this->migrator->delete("tool-csv-to-json.metaKeywords");

        $this->migrator->delete("tool-json-to-csv.metaDescription");
        $this->migrator->delete("tool-json-to-csv.metaKeywords");

        $this->migrator->delete("tool-password-generator.metaDescription");
        $this->migrator->delete("tool-password-generator.metaKeywords");

        $this->migrator->delete("tool-md5-generator.metaDescription");
        $this->migrator->delete("tool-md5-generator.metaKeywords");

        $this->migrator->delete("tool-sha-generator.metaDescription");
        $this->migrator->delete("tool-sha-generator.metaKeywords");

        $this->migrator->delete("tool-hash-generator.metaDescription");
        $this->migrator->delete("tool-hash-generator.metaKeywords");

        $this->migrator->delete("tool-word-count.metaDescription");
        $this->migrator->delete("tool-word-count.metaKeywords");

        $this->migrator->delete("tool-lorem-ipsum-generator.metaDescription");
        $this->migrator->delete("tool-lorem-ipsum-generator.metaKeywords");

        $this->migrator->delete("tool-text-separator.metaDescription");
        $this->migrator->delete("tool-text-separator.metaKeywords");

        $this->migrator->delete("tool-duplicate-lines-remover.metaDescription");
        $this->migrator->delete("tool-duplicate-lines-remover.metaKeywords");

        $this->migrator->delete("tool-seo-tags-generator.metaDescription");
        $this->migrator->delete("tool-seo-tags-generator.metaKeywords");

        $this->migrator->delete("tool-html-entity-encode.metaDescription");
        $this->migrator->delete("tool-html-entity-encode.metaKeywords");

        $this->migrator->delete("tool-html-entity-decode.metaDescription");
        $this->migrator->delete("tool-html-entity-decode.metaKeywords");

        $this->migrator->delete("tool-html-tags-stripper.metaDescription");
        $this->migrator->delete("tool-html-tags-stripper.metaKeywords");

        $this->migrator->delete("tool-html-minifier.metaDescription");
        $this->migrator->delete("tool-html-minifier.metaKeywords");

        $this->migrator->delete("tool-css-minifier.metaDescription");
        $this->migrator->delete("tool-css-minifier.metaKeywords");

        $this->migrator->delete("tool-js-minifier.metaDescription");
        $this->migrator->delete("tool-js-minifier.metaKeywords");

        $this->migrator->delete("tool-html-formatter.metaDescription");
        $this->migrator->delete("tool-html-formatter.metaKeywords");

        $this->migrator->delete("tool-css-formatter.metaDescription");
        $this->migrator->delete("tool-css-formatter.metaKeywords");

        $this->migrator->delete("tool-js-formatter.metaDescription");
        $this->migrator->delete("tool-js-formatter.metaKeywords");

        $this->migrator->delete("tool-js-obfuscator.metaDescription");
        $this->migrator->delete("tool-js-obfuscator.metaKeywords");

        $this->migrator->delete("tool-domain-generator.metaDescription");
        $this->migrator->delete("tool-domain-generator.metaKeywords");

        $this->migrator->delete("tool-domain-whois.metaDescription");
        $this->migrator->delete("tool-domain-whois.metaKeywords");

        $this->migrator->delete("tool-ip-to-hostname.metaDescription");
        $this->migrator->delete("tool-ip-to-hostname.metaKeywords");

        $this->migrator->delete("tool-hostname-to-ip.metaDescription");
        $this->migrator->delete("tool-hostname-to-ip.metaKeywords");
    }
}
