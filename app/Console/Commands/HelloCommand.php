<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloCommand extends Command
{
    private const COLORS = [
        "\e[1;31m",
        "\e[1;32m",
        "\e[1;33m",
        "\e[1;34m",
        "\e[1;35m",
        "\e[1;36m",
        "\e[1;37m",
        "\e[0;31m",
        "\e[0;32m",
        "\e[0;33m",
        "\e[0;34m",
        "\e[0;35m",
        "\e[0;36m",
        "\e[0;37m",
        "\e[1;90m",
        "\e[1;91m",
        "\e[1;92m",
        "\e[1;93m",
        "\e[1;94m",
        "\e[1;95m",
        "\e[1;96m",
        "\e[1;97m",
        "\e[0;90m",
        "\e[0;94m",
        "\e[0;96m",
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hello-color-output';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $alphabet = $this->prepareAlphabetWithSpace();
        $expected = 'hello world';
        $expectedChars = str_split($expected);

        $result = '';
        foreach ($expectedChars as $position => $expectedChar) {
            foreach ($alphabet as $alphabetChar) {
                $result[$position] = $alphabetChar;
                usleep(50000);
                $this->displayEachCharDiffColor($result);

                if ($alphabetChar === $expectedChar) {
                    break;
                }
            }
        }
    }

    private function displayEachCharDiffColor(string $output): void
    {
        $chars = str_split($output);
        $coloredText = '';
        foreach ($chars as $char) {
            $coloredText .= $this->colorText($char);
        }

        $this->displayOutput($coloredText);
    }

    private function colorText(string $text): string
    {
        return sprintf(
            "%s%s%s",
            $this->getRandColor(),
            $text,
            "\e[0m",
        );
    }

    private function getRandColor(): string
    {
        return self::COLORS[rand(0, 24)];
    }

    private function prepareAlphabetWithSpace(): array
    {
        $alphabet = range('a', 'z');
        array_unshift($alphabet, ' ');

        return $alphabet;
    }

    private function displayOutput(string $output): void
    {
        echo $output . PHP_EOL;
    }
}
