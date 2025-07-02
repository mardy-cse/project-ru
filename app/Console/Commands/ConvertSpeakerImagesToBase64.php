<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Speakers;
use Illuminate\Support\Facades\Storage;

class ConvertSpeakerImagesToBase64 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speakers:convert-images-to-base64';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert existing speaker images from file paths to Base64 strings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $speakers = Speakers::whereNotNull('profile_image')
            ->orWhereNotNull('signature')
            ->get();

        $converted = 0;

        foreach ($speakers as $speaker) {
            $updated = false;

            // Convert profile image if it's a file path (not already Base64)
            if ($speaker->profile_image && strpos($speaker->profile_image, 'data:image') !== 0) {
                $profileImagePath = storage_path('app/public/' . $speaker->profile_image);
                
                if (file_exists($profileImagePath)) {
                    $profileContent = file_get_contents($profileImagePath);
                    $profileMimeType = mime_content_type($profileImagePath);
                    $profileBase64 = 'data:' . $profileMimeType . ';base64,' . base64_encode($profileContent);
                    
                    $speaker->profile_image = $profileBase64;
                    $updated = true;
                    
                    $this->info("Converted profile image for speaker: {$speaker->name}");
                }
            }

            // Convert signature if it's a file path (not already Base64)
            if ($speaker->signature && strpos($speaker->signature, 'data:image') !== 0) {
                $signaturePath = storage_path('app/public/' . $speaker->signature);
                
                if (file_exists($signaturePath)) {
                    $signatureContent = file_get_contents($signaturePath);
                    $signatureMimeType = mime_content_type($signaturePath);
                    $signatureBase64 = 'data:' . $signatureMimeType . ';base64,' . base64_encode($signatureContent);
                    
                    $speaker->signature = $signatureBase64;
                    $updated = true;
                    
                    $this->info("Converted signature for speaker: {$speaker->name}");
                }
            }

            if ($updated) {
                $speaker->save();
                $converted++;
            }
        }

        $this->info("Conversion completed! {$converted} speakers updated.");
        
        return Command::SUCCESS;
    }
}
