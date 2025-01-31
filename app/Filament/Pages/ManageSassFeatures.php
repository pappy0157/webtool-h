<?php

namespace App\Filament\Pages;

use App\Filament\Extensions\BitflanSettingsPage;
use App\Settings\SassFeatures;
use Filament\Forms\Components;

class ManageSassFeatures extends BitflanSettingsPage
{
    protected static ?string $title           = 'Manage Software-as-a-Service Features';
    protected static ?string $navigationGroup = 'Administration';
    protected static ?string $navigationLabel = 'Manage SaaS Features';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?int $navigationSort = 1;

    protected static string $settings = SassFeatures::class;

    protected function getFormSchema(): array
    {
        return [
            Components\Card::make([
                Components\Toggle::make('status')->label('Enable Software as a Service features on your website.')->helperText('If this option is enabled, users will be able to purchase subscription plans.')->columnSpan(2),
                Components\TextInput::make('premiumPriceMonthly')->label('Price of Premium Subscription / Per Month')->default(2.99)->numeric()->minValue(0.25)->prefix('$')->columnSpan(1),
                Components\TextInput::make('premiumPriceAnnually')->label('Price of Premium Subscription / Per Year')->default(29.99)->numeric()->minValue(0.25)->prefix('$')->columnSpan(1),
            ])->columns(2)->columnSpan(2),

            Components\Card::make([
                Components\TextInput::make('stripePublic')->label('Stripe Public Key')->columnSpan(2),
                Components\TextInput::make('stripePrivate')->password()->label('Stripe Secret Key')->columnSpan(2)->helperText('Use your Test Keys if you want to test payments only. Use your Real Keys only for REAL PAYMENTS.'),
                
                // Components\TextInput::make('stripeMonthlyItem')->label('Stripe Product ID (Monthly)')->columnSpan(1)->helperText('You can find these after creating the Products in your Stripe Dashboard.'),
                // Components\TextInput::make('stripeYearlyItem')->label('Stripe Product ID (Yearly)')->columnSpan(1),

                Components\View::make('filament.components.stripe-help-component')->columnSpan(2)
                // Components\Actions\Action::make('link')->label('Click Here for a Thorough Tutorial on how to set-up Stripe with CyberTools')->url('#')
            ])->columns(2)->columnSpan(2),

            Components\Card::make([
                Components\TextInput::make('googleClientId')->label('Google OAUTH2.0 Client ID')->columnSpan(2),
                Components\TextInput::make('googleClientSecret')->password()->label('Google OAUTH2.0 Client Secret')->columnSpan(2)->helperText('You can get these details from the Google API Console. If both of these options are filled, Social Login will be enabled automatically.'),
            
                Components\View::make('filament.components.google-help-component')->columnSpan(2)
            ])->columns(2)->columnSpan(2),

            Components\Card::make([
                Components\CheckboxList::make('premiumTools')->label('Premium Tools')->helperText('These Tools will require Premium Membership to be Used.')->options(function() {
                    $cats = config('tools.categories');

                    $tools = [];

                    foreach($cats as $cat) {
                        foreach($cat['tools'] as $name => $tool) {
                            $tools[$name] = $tool['admin']['title'];
                        }
                    }

                    return $tools;
                })
            ])->columns(1)->columnSpan(2)
        ];
    }
}
