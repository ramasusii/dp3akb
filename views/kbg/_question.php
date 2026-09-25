<?php

use yii\helpers\Html;
use yii\helpers\Json;

/** @var array $question */
/** @var array $answerMap */

$key = $question['key'];
$type = $question['type'];
$value = array_key_exists($key, $answerMap)
    ? $answerMap[$key]
    : null;

$fullWidth = in_array($type, ['textarea', 'checkbox'], true)
    || strlen($question['label']) > 105
    || in_array($key, ['q1_0', 'q1_6c'], true);

$columnClass = $fullWidth
    ? 'col-md-12'
    : 'col-md-6';

$conditionAttributes = '';

if (!empty($question['show_if'])) {
    $conditionAttributes =
        ' data-show-key="'
        . Html::encode($question['show_if']['key'])
        . '" data-show-values="'
        . Html::encode(Json::encode(
            $question['show_if']['values']
        ))
        . '"';
}
?>

<div
    class="<?= $columnClass ?> kbg-question-col"
    <?= $conditionAttributes ?>
>
    <div class="kbg-question">

        <div class="kbg-question-head">

            <span class="kbg-question-code">
                <?= Html::encode($question['code']) ?>
            </span>

            <label class="kbg-question-label">
                <?= Html::encode($question['label']) ?>

                <?php if (!empty($question['required'])): ?>
                    <span
                        class="kbg-required"
                        title="Wajib diisi"
                    >*</span>
                <?php endif; ?>
            </label>

        </div>

        <?php if (!empty($question['help'])): ?>
            <div class="kbg-help">
                <?= Html::encode($question['help']) ?>
            </div>
        <?php endif; ?>


        <?php if ($type === 'radio'): ?>

            <div class="kbg-choice-grid">
                <?php foreach ($question['options'] as $option): ?>

                    <?php
                    $checked = (string) $value === (string) $option;
                    $id = 'answer-'
                        . $key
                        . '-'
                        . substr(md5($option), 0, 8);
                    ?>

                    <label class="kbg-choice" for="<?= $id ?>">
                        <input
                            type="radio"
                            id="<?= $id ?>"
                            name="answers[<?= Html::encode($key) ?>]"
                            value="<?= Html::encode($option) ?>"
                            <?= $checked ? 'checked' : '' ?>
                        >

                        <span>
                            <?= Html::encode($option) ?>
                        </span>
                    </label>

                <?php endforeach; ?>
            </div>


        <?php elseif ($type === 'checkbox'): ?>

            <?php
            $selected = is_array($value)
                ? $value
                : [];
            ?>

            <div
                class="kbg-choice-grid"
                data-checkbox-group="<?= Html::encode($key) ?>"
            >
                <?php foreach ($question['options'] as $option): ?>

                    <?php
                    $checked = in_array(
                        $option,
                        $selected,
                        true
                    );

                    $id = 'answer-'
                        . $key
                        . '-'
                        . substr(md5($option), 0, 8);
                    ?>

                    <label
                        class="kbg-choice checkbox-choice"
                        for="<?= $id ?>"
                    >
                        <input
                            type="checkbox"
                            id="<?= $id ?>"
                            name="answers[<?= Html::encode($key) ?>][]"
                            value="<?= Html::encode($option) ?>"
                            <?= $checked ? 'checked' : '' ?>
                            <?= $option === 'Tidak'
                                ? 'data-exclusive="1"'
                                : '' ?>
                        >

                        <span>
                            <?= Html::encode($option) ?>
                        </span>
                    </label>

                <?php endforeach; ?>
            </div>


        <?php elseif ($type === 'textarea'): ?>

            <textarea
                class="kbg-control"
                name="answers[<?= Html::encode($key) ?>]"
                rows="4"
                placeholder="<?= Html::encode(
                    isset($question['placeholder'])
                        ? $question['placeholder']
                        : 'Tuliskan jawaban...'
                ) ?>"
            ><?= Html::encode(
                is_array($value)
                    ? implode(', ', $value)
                    : (string) $value
            ) ?></textarea>


        <?php else: ?>

            <?php
            $inputType = $type === 'datetime-local'
                ? 'datetime-local'
                : (
                    $type === 'number'
                        ? 'number'
                        : 'text'
                );

            $displayValue = $value;

            if ($type === 'datetime-local'
                && !empty($value)
                && strpos((string) $value, 'T') === false) {
                $displayValue = date(
                    'Y-m-d\TH:i',
                    strtotime((string) $value)
                );
            }

            $numberAttributes = '';

            if ($type === 'number') {
                $numberAttributes = ' step="any"';

                if (strpos($key, 'q2_6_') !== 0) {
                    $numberAttributes .= ' min="0"';
                }

                if ($key === 'q1_5') {
                    $numberAttributes .= ' max="120"';
                }
            }
            ?>

            <?php if (!empty($question['suffix'])): ?>

                <div class="kbg-input-group">
                    <input
                        type="<?= $inputType ?>"
                        class="kbg-control"
                        name="answers[<?= Html::encode($key) ?>]"
                        value="<?= Html::encode(
                            is_array($displayValue)
                                ? ''
                                : (string) $displayValue
                        ) ?>"
                        placeholder="<?= Html::encode(
                            isset($question['placeholder'])
                                ? $question['placeholder']
                                : ''
                        ) ?>"
                        <?= $numberAttributes ?>
                    >

                    <span class="kbg-addon">
                        <?= Html::encode($question['suffix']) ?>
                    </span>
                </div>

            <?php else: ?>

                <input
                    type="<?= $inputType ?>"
                    class="kbg-control"
                    name="answers[<?= Html::encode($key) ?>]"
                    value="<?= Html::encode(
                        is_array($displayValue)
                            ? ''
                            : (string) $displayValue
                    ) ?>"
                    placeholder="<?= Html::encode(
                        isset($question['placeholder'])
                            ? $question['placeholder']
                            : ''
                    ) ?>"
                    <?= $numberAttributes ?>
                >

            <?php endif; ?>

        <?php endif; ?>

    </div>
</div>
