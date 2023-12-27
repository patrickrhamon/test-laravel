<?php

function sum(int|float $numberOne, int|float $numberTwo): float|int
{
    return $numberOne + $numberTwo;
}

describe('desempenho', function () {
    it('testando soma', function () {
        $result = sum(1, 2);

        expect($result)->toBe(3)
            ->toBeInt();
    });

    it('Testando Soma de Floats', function () {
        $result = sum(1.3, 2.7);

        expect($result)->toBe(4.0)
            ->toBeFloat();
    });
});
