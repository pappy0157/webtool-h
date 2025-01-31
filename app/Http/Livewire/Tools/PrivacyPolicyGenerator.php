<?php

namespace App\Http\Livewire\Tools;

use App\Settings\Tools\DomainGeneratorSettings;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Support\Str;

class PrivacyPolicyGenerator extends Component
{
    public string $name_full       = '';
    public string $name            = '';
    public string $name_possessive = '';
    public string $website_url     = '';
    public string $domain_name     = '';
    public string $heading         = '';
    public string $privacy_policy  = '';

    public int $error = 0;

    public function submit() {
        $tcpp_bizname              = $this->name;
        $tcpp_biznamefull          = $this->name_full;
        $tcpp_biznamepossessive    = $this->name_possessive;
        $tcpp_websiteurl           = $this->website_url;
        $tcpp_domainname           = $this->domain_name;
        $tcpp_privacypolicyheading = $this->heading; 

        $tcpp_privacypolicy = '';
        $tcpp_privacypolicy .= "<h2 id='atospp-privacy' class='auto-tos-pp ppheading'>$tcpp_privacypolicyheading:</h2>";
        $tcpp_privacypolicy .= "<p>$tcpp_biznamefull (&quot;<strong>$tcpp_bizname</strong>&quot;) operates $tcpp_domainname and may operate other websites. It is $tcpp_biznamepossessive policy to respect your privacy regarding any information we may collect while operating our websites.</p>
        <h3>Website Visitors</h3>
        <p>Like most website operators, $tcpp_bizname collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. $tcpp_biznamepossessive purpose in collecting non-personally identifying information is to better understand how $tcpp_biznamepossessive visitors use its website. From time to time, $tcpp_bizname may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
        <p>$tcpp_bizname also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on $tcpp_domainname blogs/sites. $tcpp_bizname only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below, except that commenter IP addresses and email addresses are visible and disclosed to the administrators of the blog/site where the comment was left.</p>
        <h3>Gathering of Personally-Identifying Information</h3>
        <p>Certain visitors to $tcpp_biznamepossessive websites choose to interact with $tcpp_bizname in ways that require $tcpp_bizname to gather personally-identifying information. The amount and type of information that $tcpp_bizname gathers depends on the nature of the interaction. For example, we ask visitors who sign up  at <a href=\"$tcpp_websiteurl\">$tcpp_domainname</a> to provide a username and email address. Those who engage in transactions with $tcpp_bizname are asked to provide additional information, including as necessary the personal and financial information required to process those transactions. In each case, $tcpp_bizname collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor's interaction with $tcpp_bizname. $tcpp_bizname does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities.</p>
        <h3>Aggregated Statistics</h3>
        <p>$tcpp_bizname may collect statistics about the behavior of visitors to its websites. $tcpp_bizname may display this information publicly or provide it to others. However, $tcpp_bizname does not disclose personally-identifying information other than as described below.</p>
        <h3>Protection of Certain Personally-Identifying Information</h3>
        <p>$tcpp_bizname discloses potentially personally-identifying and personally-identifying information only to those of its employees, contractors and affiliated organizations that (i) need to know that information in order to process it on $tcpp_biznamepossessive behalf or to provide services available at $tcpp_biznamepossessive websites, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using $tcpp_biznamepossessive websites, you consent to the transfer of such information to them. $tcpp_bizname will not rent or sell potentially personally-identifying and personally-identifying information to anyone. Other than to its employees, contractors and affiliated organizations, as described above, $tcpp_bizname discloses potentially personally-identifying and personally-identifying information only in response to a subpoena, court order or other governmental request, or when $tcpp_bizname believes in good faith that disclosure is reasonably necessary to protect the property or rights of $tcpp_bizname, third parties or the public at large. If you are a registered user of an $tcpp_bizname website and have supplied your email address, $tcpp_bizname may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what's going on with $tcpp_bizname and our products.  If you send us a request (for example via email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. $tcpp_bizname takes all measures reasonably necessary to protect against the unauthorized access, use, alteration or destruction of potentially personally-identifying and personally-identifying information.</p>
        <h3>Cookies</h3>
        <p>A cookie is a string of information that a website stores on a visitor's computer, and that the visitor's browser provides to the website each time the visitor returns. $tcpp_bizname uses cookies to help $tcpp_bizname identify and track visitors, their usage of $tcpp_bizname website, and their website access preferences. $tcpp_bizname visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using $tcpp_biznamepossessive websites, with the drawback that certain features of $tcpp_biznamepossessive websites may not function properly without the aid of cookies.</p>
        <h3>Business Transfers</h3>
        <p>If $tcpp_bizname, or substantially all of its assets, were acquired, or in the unlikely event that $tcpp_bizname goes out of business or enters bankruptcy, user information would be one of the assets that is transferred or acquired by a third party. You acknowledge that such transfers may occur, and that any acquirer of $tcpp_bizname may continue to use your personal information as set forth in this policy.</p>
        <h3>Ads</h3>
        <p>Ads appearing on any of our websites may be delivered to users by advertising partners, who may set cookies. These cookies allow the ad server to recognize your computer each time they send you an online advertisement to compile information about you or others who use your computer. This information allows ad networks to, among other things, deliver targeted advertisements that they believe will be of most interest to you. This Privacy Policy covers the use of cookies by $tcpp_bizname and does not cover the use of cookies by any advertisers.</p>
        <h3>$tcpp_privacypolicyheading Changes</h3>
        <p>Although most changes are likely to be minor, $tcpp_bizname may change its $tcpp_privacypolicyheading from time to time, and in $tcpp_biznamepossessive sole discretion. $tcpp_bizname encourages visitors to frequently check this page for any changes to its $tcpp_privacypolicyheading. If you have a $tcpp_domainname account, you might also receive an alert informing you of these changes. Your continued use of this site after any change in this $tcpp_privacypolicyheading will constitute your acceptance of such change.</p>";
    
        $this->privacy_policy = $tcpp_privacypolicy;
    }

    public function render()
    {
        return view('modules.tools.privacy-policy-generator.livewire');
    }
}
