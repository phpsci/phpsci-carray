<?php
namespace PHPSci\Utils;

use PHPSci\CArray;
use PHPSci\Exceptions\ValueErrorException;
use PHPSci\Interfaces\Classifier;

/**
 * Class MulticlassUtils
 * @package PHPSci\Utils
 * @see https://github.com/scikit-learn/scikit-learn/blob/master/sklearn/utils/multiclass.py
 */
class MulticlassUtils
{
    /**
     * Private helper function for factorizing common classes param logic
     *
     * Estimators that implement the ``partial_fit`` API need to be provided with
     * the list of possible classes at the first call to partial_fit.
     *
     * Subsequent calls to partial_fit should check that ``classes`` is still
     * consistent with a previous value of ``clf.classes_`` when provided.
     *
     * This function returns True if it detects that this was the first call to
     *  ``partial_fit`` on ``clf``. In that case the ``classes_`` attribute is also
     * set on ``clf``.
     *
     * @see https://github.com/scikit-learn/scikit-learn/blob/master/sklearn/utils/multiclass.py
     * @param Classifier $clf
     * @param \CArray|null $classes
     * @return bool
     * @throws ValueErrorException
     */
    public static function _check_partial_fit_first_call(Classifier $clf, \CArray $classes = null)
    {
        if($clf->classes_() == null && !isset($classes) ) {
            throw new ValueErrorException("classes must be passed on the first call to partial_fit.");
        }

        if(isset($classes)) {
            if($clf->classes_()) {

            } else {
                $clf->classes_(CArray::unique($classes));
                return true;
            }
        }
        # classes is None and clf.classes_ has already previously been set:
        # nothing to do
        return false;
    }
}