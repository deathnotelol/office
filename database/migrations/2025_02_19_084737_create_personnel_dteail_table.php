<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personnel_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personnel_data_id')->constrained('personnel_data')->onDelete('cascade'); // Foreign key
            
            //တပ်မတော်သား(သို့မဟုတ်) အခြားဝန်ကြီးဌာန/ အဖွဲ့အစည်းမှ ကူးပြောင်းလာပါက

            $table->string('srcNo')->nullable();
            $table->string('personalNo')->nullable();
            $table->string('cadetTrainingNo')->nullable();
            $table->string('outOfReason')->nullable();
            $table->string('servedArmies')->nullable();
            $table->string('caseAndPunishment')->nullable();

            //အမွေစား/ အမွေခံ
            $table->string('inheriNo')->nullable();
            $table->string('inheriName')->nullable();
            $table->string('inheriRelation')->nullable();
            $table->string('inheriAddress')->nullable();
            $table->string('inheriRemark')->nullable();

            //သား/ သမီး
            $table->string('childNo')->nullable();
            $table->string('childName')->nullable();
            $table->date('childDob')->nullable();
            $table->string('childAge')->nullable();
            $table->string('childOccupation')->nullable();
            $table->string('childAddress')->nullable();

            //ဘွဲထူး/ဂုဏ်ထူး/တံဆပ်
            $table->string('medalNo')->nullable();
            $table->string('medalName')->nullable();

            //ပြစ်မှု/ ပြစ်ဒဏ်မှတ်တမ်း

            $table->string('crimeNo')->nullable();
            $table->string('crimeName')->nullable();
            $table->string('punishment')->nullable();
            $table->date('crimeDate')->nullable();
            $table->string('crimeRemark')->nullable();

            //တာဝန်ထမ်းဆောင်မှုမှတ်တမ်း (ပြည်ထဲရေးဝန်ကြီးဌာန)

            $table->string('servedNo')->nullable();
            $table->string('servedRank')->nullable();
            $table->string('servedPlace')->nullable();
            $table->date('servedPeriodFrom')->nullable();
            $table->date('servedPeriodTo')->nullable();
            $table->string('servedRemark')->nullable();

            //ပြည်တွင်းသင်တန်းတက်ရောက်မှု

            $table->string('traningInterNo')->nullable();
            $table->string('traningInterName')->nullable();
            $table->date('traningInterPeriodFrom')->nullable();
            $table->date('traningInterPeriodTo')->nullable();

            //ပြည်ပသင်တန်းတက်ရောက်မှု

            $table->string('traningOuterNo')->nullable();
            $table->string('traningOuterName')->nullable();
            $table->date('traningOuterPeriodFrom')->nullable();
            $table->date('traningOuterPeriodTo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel_dteail');
    }
};
