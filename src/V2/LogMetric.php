<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/logging/v2/logging_metrics.proto

namespace Google\Cloud\Logging\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes a logs-based metric. The value of the metric is the number of log
 * entries that match a logs filter in a given time interval.
 * Logs-based metrics can also be used to extract values from logs and create a
 * distribution of the values. The distribution records the statistics of the
 * extracted values along with an optional histogram of the values as specified
 * by the bucket options.
 *
 * Generated from protobuf message <code>google.logging.v2.LogMetric</code>
 */
class LogMetric extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The client-assigned metric identifier.
     * Examples: `"error_count"`, `"nginx/requests"`.
     * Metric identifiers are limited to 100 characters and can include only the
     * following characters: `A-Z`, `a-z`, `0-9`, and the special characters
     * `_-.,+!*',()%/`. The forward-slash character (`/`) denotes a hierarchy of
     * name pieces, and it cannot be the first character of the name.
     * This field is the `[METRIC_ID]` part of a metric resource name in the
     * format "projects/[PROJECT_ID]/metrics/[METRIC_ID]". Example: If the
     * resource name of a metric is
     * `"projects/my-project/metrics/nginx%2Frequests"`, this field's value is
     * `"nginx/requests"`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $name = '';
    /**
     * Optional. A description of this metric, which is used in documentation.
     * The maximum length of the description is 8000 characters.
     *
     * Generated from protobuf field <code>string description = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $description = '';
    /**
     * Required. An [advanced logs
     * filter](https://cloud.google.com/logging/docs/view/advanced_filters) which
     * is used to match log entries. Example:
     *     "resource.type=gae_app AND severity>=ERROR"
     * The maximum length of the filter is 20000 characters.
     *
     * Generated from protobuf field <code>string filter = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $filter = '';
    /**
     * Optional. The resource name of the Log Bucket that owns the Log Metric.
     * Only Log Buckets in projects are supported. The bucket has to be in the
     * same project as the metric.
     * For example:
     *   `projects/my-project/locations/global/buckets/my-bucket`
     * If empty, then the Log Metric is considered a non-Bucket Log Metric.
     *
     * Generated from protobuf field <code>string bucket_name = 13 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $bucket_name = '';
    /**
     * Optional. If set to True, then this metric is disabled and it does not
     * generate any points.
     *
     * Generated from protobuf field <code>bool disabled = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $disabled = false;
    /**
     * Optional. The metric descriptor associated with the logs-based metric.
     * If unspecified, it uses a default metric descriptor with a DELTA metric
     * kind, INT64 value type, with no labels and a unit of "1". Such a metric
     * counts the number of log entries matching the `filter` expression.
     * The `name`, `type`, and `description` fields in the `metric_descriptor`
     * are output only, and is constructed using the `name` and `description`
     * field in the LogMetric.
     * To create a logs-based metric that records a distribution of log values, a
     * DELTA metric kind with a DISTRIBUTION value type must be used along with
     * a `value_extractor` expression in the LogMetric.
     * Each label in the metric descriptor must have a matching label
     * name as the key and an extractor expression as the value in the
     * `label_extractors` map.
     * The `metric_kind` and `value_type` fields in the `metric_descriptor` cannot
     * be updated once initially configured. New labels can be added in the
     * `metric_descriptor`, but existing labels cannot be modified except for
     * their description.
     *
     * Generated from protobuf field <code>.google.api.MetricDescriptor metric_descriptor = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $metric_descriptor = null;
    /**
     * Optional. A `value_extractor` is required when using a distribution
     * logs-based metric to extract the values to record from a log entry.
     * Two functions are supported for value extraction: `EXTRACT(field)` or
     * `REGEXP_EXTRACT(field, regex)`. The arguments are:
     *   1. field: The name of the log entry field from which the value is to be
     *      extracted.
     *   2. regex: A regular expression using the Google RE2 syntax
     *      (https://github.com/google/re2/wiki/Syntax) with a single capture
     *      group to extract data from the specified log entry field. The value
     *      of the field is converted to a string before applying the regex.
     *      It is an error to specify a regex that does not include exactly one
     *      capture group.
     * The result of the extraction must be convertible to a double type, as the
     * distribution always records double values. If either the extraction or
     * the conversion to double fails, then those values are not recorded in the
     * distribution.
     * Example: `REGEXP_EXTRACT(jsonPayload.request, ".*quantity=(\d+).*")`
     *
     * Generated from protobuf field <code>string value_extractor = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $value_extractor = '';
    /**
     * Optional. A map from a label key string to an extractor expression which is
     * used to extract data from a log entry field and assign as the label value.
     * Each label key specified in the LabelDescriptor must have an associated
     * extractor expression in this map. The syntax of the extractor expression
     * is the same as for the `value_extractor` field.
     * The extracted value is converted to the type defined in the label
     * descriptor. If either the extraction or the type conversion fails,
     * the label will have a default value. The default value for a string
     * label is an empty string, for an integer label its 0, and for a boolean
     * label its `false`.
     * Note that there are upper bounds on the maximum number of labels and the
     * number of active time series that are allowed in a project.
     *
     * Generated from protobuf field <code>map<string, string> label_extractors = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $label_extractors;
    /**
     * Optional. The `bucket_options` are required when the logs-based metric is
     * using a DISTRIBUTION value type and it describes the bucket boundaries
     * used to create a histogram of the extracted values.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions bucket_options = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $bucket_options = null;
    /**
     * Output only. The creation timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The last update timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Deprecated. The API version that created or updated this metric.
     * The v2 format is used by default and cannot be changed.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric.ApiVersion version = 4 [deprecated = true];</code>
     * @deprecated
     */
    protected $version = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The client-assigned metric identifier.
     *           Examples: `"error_count"`, `"nginx/requests"`.
     *           Metric identifiers are limited to 100 characters and can include only the
     *           following characters: `A-Z`, `a-z`, `0-9`, and the special characters
     *           `_-.,+!*',()%/`. The forward-slash character (`/`) denotes a hierarchy of
     *           name pieces, and it cannot be the first character of the name.
     *           This field is the `[METRIC_ID]` part of a metric resource name in the
     *           format "projects/[PROJECT_ID]/metrics/[METRIC_ID]". Example: If the
     *           resource name of a metric is
     *           `"projects/my-project/metrics/nginx%2Frequests"`, this field's value is
     *           `"nginx/requests"`.
     *     @type string $description
     *           Optional. A description of this metric, which is used in documentation.
     *           The maximum length of the description is 8000 characters.
     *     @type string $filter
     *           Required. An [advanced logs
     *           filter](https://cloud.google.com/logging/docs/view/advanced_filters) which
     *           is used to match log entries. Example:
     *               "resource.type=gae_app AND severity>=ERROR"
     *           The maximum length of the filter is 20000 characters.
     *     @type string $bucket_name
     *           Optional. The resource name of the Log Bucket that owns the Log Metric.
     *           Only Log Buckets in projects are supported. The bucket has to be in the
     *           same project as the metric.
     *           For example:
     *             `projects/my-project/locations/global/buckets/my-bucket`
     *           If empty, then the Log Metric is considered a non-Bucket Log Metric.
     *     @type bool $disabled
     *           Optional. If set to True, then this metric is disabled and it does not
     *           generate any points.
     *     @type \Google\Api\MetricDescriptor $metric_descriptor
     *           Optional. The metric descriptor associated with the logs-based metric.
     *           If unspecified, it uses a default metric descriptor with a DELTA metric
     *           kind, INT64 value type, with no labels and a unit of "1". Such a metric
     *           counts the number of log entries matching the `filter` expression.
     *           The `name`, `type`, and `description` fields in the `metric_descriptor`
     *           are output only, and is constructed using the `name` and `description`
     *           field in the LogMetric.
     *           To create a logs-based metric that records a distribution of log values, a
     *           DELTA metric kind with a DISTRIBUTION value type must be used along with
     *           a `value_extractor` expression in the LogMetric.
     *           Each label in the metric descriptor must have a matching label
     *           name as the key and an extractor expression as the value in the
     *           `label_extractors` map.
     *           The `metric_kind` and `value_type` fields in the `metric_descriptor` cannot
     *           be updated once initially configured. New labels can be added in the
     *           `metric_descriptor`, but existing labels cannot be modified except for
     *           their description.
     *     @type string $value_extractor
     *           Optional. A `value_extractor` is required when using a distribution
     *           logs-based metric to extract the values to record from a log entry.
     *           Two functions are supported for value extraction: `EXTRACT(field)` or
     *           `REGEXP_EXTRACT(field, regex)`. The arguments are:
     *             1. field: The name of the log entry field from which the value is to be
     *                extracted.
     *             2. regex: A regular expression using the Google RE2 syntax
     *                (https://github.com/google/re2/wiki/Syntax) with a single capture
     *                group to extract data from the specified log entry field. The value
     *                of the field is converted to a string before applying the regex.
     *                It is an error to specify a regex that does not include exactly one
     *                capture group.
     *           The result of the extraction must be convertible to a double type, as the
     *           distribution always records double values. If either the extraction or
     *           the conversion to double fails, then those values are not recorded in the
     *           distribution.
     *           Example: `REGEXP_EXTRACT(jsonPayload.request, ".*quantity=(\d+).*")`
     *     @type array|\Google\Protobuf\Internal\MapField $label_extractors
     *           Optional. A map from a label key string to an extractor expression which is
     *           used to extract data from a log entry field and assign as the label value.
     *           Each label key specified in the LabelDescriptor must have an associated
     *           extractor expression in this map. The syntax of the extractor expression
     *           is the same as for the `value_extractor` field.
     *           The extracted value is converted to the type defined in the label
     *           descriptor. If either the extraction or the type conversion fails,
     *           the label will have a default value. The default value for a string
     *           label is an empty string, for an integer label its 0, and for a boolean
     *           label its `false`.
     *           Note that there are upper bounds on the maximum number of labels and the
     *           number of active time series that are allowed in a project.
     *     @type \Google\Api\Distribution\BucketOptions $bucket_options
     *           Optional. The `bucket_options` are required when the logs-based metric is
     *           using a DISTRIBUTION value type and it describes the bucket boundaries
     *           used to create a histogram of the extracted values.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The creation timestamp of the metric.
     *           This field may not be present for older metrics.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The last update timestamp of the metric.
     *           This field may not be present for older metrics.
     *     @type int $version
     *           Deprecated. The API version that created or updated this metric.
     *           The v2 format is used by default and cannot be changed.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Logging\V2\LoggingMetrics::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The client-assigned metric identifier.
     * Examples: `"error_count"`, `"nginx/requests"`.
     * Metric identifiers are limited to 100 characters and can include only the
     * following characters: `A-Z`, `a-z`, `0-9`, and the special characters
     * `_-.,+!*',()%/`. The forward-slash character (`/`) denotes a hierarchy of
     * name pieces, and it cannot be the first character of the name.
     * This field is the `[METRIC_ID]` part of a metric resource name in the
     * format "projects/[PROJECT_ID]/metrics/[METRIC_ID]". Example: If the
     * resource name of a metric is
     * `"projects/my-project/metrics/nginx%2Frequests"`, this field's value is
     * `"nginx/requests"`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The client-assigned metric identifier.
     * Examples: `"error_count"`, `"nginx/requests"`.
     * Metric identifiers are limited to 100 characters and can include only the
     * following characters: `A-Z`, `a-z`, `0-9`, and the special characters
     * `_-.,+!*',()%/`. The forward-slash character (`/`) denotes a hierarchy of
     * name pieces, and it cannot be the first character of the name.
     * This field is the `[METRIC_ID]` part of a metric resource name in the
     * format "projects/[PROJECT_ID]/metrics/[METRIC_ID]". Example: If the
     * resource name of a metric is
     * `"projects/my-project/metrics/nginx%2Frequests"`, this field's value is
     * `"nginx/requests"`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Optional. A description of this metric, which is used in documentation.
     * The maximum length of the description is 8000 characters.
     *
     * Generated from protobuf field <code>string description = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Optional. A description of this metric, which is used in documentation.
     * The maximum length of the description is 8000 characters.
     *
     * Generated from protobuf field <code>string description = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Required. An [advanced logs
     * filter](https://cloud.google.com/logging/docs/view/advanced_filters) which
     * is used to match log entries. Example:
     *     "resource.type=gae_app AND severity>=ERROR"
     * The maximum length of the filter is 20000 characters.
     *
     * Generated from protobuf field <code>string filter = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Required. An [advanced logs
     * filter](https://cloud.google.com/logging/docs/view/advanced_filters) which
     * is used to match log entries. Example:
     *     "resource.type=gae_app AND severity>=ERROR"
     * The maximum length of the filter is 20000 characters.
     *
     * Generated from protobuf field <code>string filter = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->filter = $var;

        return $this;
    }

    /**
     * Optional. The resource name of the Log Bucket that owns the Log Metric.
     * Only Log Buckets in projects are supported. The bucket has to be in the
     * same project as the metric.
     * For example:
     *   `projects/my-project/locations/global/buckets/my-bucket`
     * If empty, then the Log Metric is considered a non-Bucket Log Metric.
     *
     * Generated from protobuf field <code>string bucket_name = 13 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getBucketName()
    {
        return $this->bucket_name;
    }

    /**
     * Optional. The resource name of the Log Bucket that owns the Log Metric.
     * Only Log Buckets in projects are supported. The bucket has to be in the
     * same project as the metric.
     * For example:
     *   `projects/my-project/locations/global/buckets/my-bucket`
     * If empty, then the Log Metric is considered a non-Bucket Log Metric.
     *
     * Generated from protobuf field <code>string bucket_name = 13 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setBucketName($var)
    {
        GPBUtil::checkString($var, True);
        $this->bucket_name = $var;

        return $this;
    }

    /**
     * Optional. If set to True, then this metric is disabled and it does not
     * generate any points.
     *
     * Generated from protobuf field <code>bool disabled = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Optional. If set to True, then this metric is disabled and it does not
     * generate any points.
     *
     * Generated from protobuf field <code>bool disabled = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setDisabled($var)
    {
        GPBUtil::checkBool($var);
        $this->disabled = $var;

        return $this;
    }

    /**
     * Optional. The metric descriptor associated with the logs-based metric.
     * If unspecified, it uses a default metric descriptor with a DELTA metric
     * kind, INT64 value type, with no labels and a unit of "1". Such a metric
     * counts the number of log entries matching the `filter` expression.
     * The `name`, `type`, and `description` fields in the `metric_descriptor`
     * are output only, and is constructed using the `name` and `description`
     * field in the LogMetric.
     * To create a logs-based metric that records a distribution of log values, a
     * DELTA metric kind with a DISTRIBUTION value type must be used along with
     * a `value_extractor` expression in the LogMetric.
     * Each label in the metric descriptor must have a matching label
     * name as the key and an extractor expression as the value in the
     * `label_extractors` map.
     * The `metric_kind` and `value_type` fields in the `metric_descriptor` cannot
     * be updated once initially configured. New labels can be added in the
     * `metric_descriptor`, but existing labels cannot be modified except for
     * their description.
     *
     * Generated from protobuf field <code>.google.api.MetricDescriptor metric_descriptor = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Api\MetricDescriptor|null
     */
    public function getMetricDescriptor()
    {
        return $this->metric_descriptor;
    }

    public function hasMetricDescriptor()
    {
        return isset($this->metric_descriptor);
    }

    public function clearMetricDescriptor()
    {
        unset($this->metric_descriptor);
    }

    /**
     * Optional. The metric descriptor associated with the logs-based metric.
     * If unspecified, it uses a default metric descriptor with a DELTA metric
     * kind, INT64 value type, with no labels and a unit of "1". Such a metric
     * counts the number of log entries matching the `filter` expression.
     * The `name`, `type`, and `description` fields in the `metric_descriptor`
     * are output only, and is constructed using the `name` and `description`
     * field in the LogMetric.
     * To create a logs-based metric that records a distribution of log values, a
     * DELTA metric kind with a DISTRIBUTION value type must be used along with
     * a `value_extractor` expression in the LogMetric.
     * Each label in the metric descriptor must have a matching label
     * name as the key and an extractor expression as the value in the
     * `label_extractors` map.
     * The `metric_kind` and `value_type` fields in the `metric_descriptor` cannot
     * be updated once initially configured. New labels can be added in the
     * `metric_descriptor`, but existing labels cannot be modified except for
     * their description.
     *
     * Generated from protobuf field <code>.google.api.MetricDescriptor metric_descriptor = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Api\MetricDescriptor $var
     * @return $this
     */
    public function setMetricDescriptor($var)
    {
        GPBUtil::checkMessage($var, \Google\Api\MetricDescriptor::class);
        $this->metric_descriptor = $var;

        return $this;
    }

    /**
     * Optional. A `value_extractor` is required when using a distribution
     * logs-based metric to extract the values to record from a log entry.
     * Two functions are supported for value extraction: `EXTRACT(field)` or
     * `REGEXP_EXTRACT(field, regex)`. The arguments are:
     *   1. field: The name of the log entry field from which the value is to be
     *      extracted.
     *   2. regex: A regular expression using the Google RE2 syntax
     *      (https://github.com/google/re2/wiki/Syntax) with a single capture
     *      group to extract data from the specified log entry field. The value
     *      of the field is converted to a string before applying the regex.
     *      It is an error to specify a regex that does not include exactly one
     *      capture group.
     * The result of the extraction must be convertible to a double type, as the
     * distribution always records double values. If either the extraction or
     * the conversion to double fails, then those values are not recorded in the
     * distribution.
     * Example: `REGEXP_EXTRACT(jsonPayload.request, ".*quantity=(\d+).*")`
     *
     * Generated from protobuf field <code>string value_extractor = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getValueExtractor()
    {
        return $this->value_extractor;
    }

    /**
     * Optional. A `value_extractor` is required when using a distribution
     * logs-based metric to extract the values to record from a log entry.
     * Two functions are supported for value extraction: `EXTRACT(field)` or
     * `REGEXP_EXTRACT(field, regex)`. The arguments are:
     *   1. field: The name of the log entry field from which the value is to be
     *      extracted.
     *   2. regex: A regular expression using the Google RE2 syntax
     *      (https://github.com/google/re2/wiki/Syntax) with a single capture
     *      group to extract data from the specified log entry field. The value
     *      of the field is converted to a string before applying the regex.
     *      It is an error to specify a regex that does not include exactly one
     *      capture group.
     * The result of the extraction must be convertible to a double type, as the
     * distribution always records double values. If either the extraction or
     * the conversion to double fails, then those values are not recorded in the
     * distribution.
     * Example: `REGEXP_EXTRACT(jsonPayload.request, ".*quantity=(\d+).*")`
     *
     * Generated from protobuf field <code>string value_extractor = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setValueExtractor($var)
    {
        GPBUtil::checkString($var, True);
        $this->value_extractor = $var;

        return $this;
    }

    /**
     * Optional. A map from a label key string to an extractor expression which is
     * used to extract data from a log entry field and assign as the label value.
     * Each label key specified in the LabelDescriptor must have an associated
     * extractor expression in this map. The syntax of the extractor expression
     * is the same as for the `value_extractor` field.
     * The extracted value is converted to the type defined in the label
     * descriptor. If either the extraction or the type conversion fails,
     * the label will have a default value. The default value for a string
     * label is an empty string, for an integer label its 0, and for a boolean
     * label its `false`.
     * Note that there are upper bounds on the maximum number of labels and the
     * number of active time series that are allowed in a project.
     *
     * Generated from protobuf field <code>map<string, string> label_extractors = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabelExtractors()
    {
        return $this->label_extractors;
    }

    /**
     * Optional. A map from a label key string to an extractor expression which is
     * used to extract data from a log entry field and assign as the label value.
     * Each label key specified in the LabelDescriptor must have an associated
     * extractor expression in this map. The syntax of the extractor expression
     * is the same as for the `value_extractor` field.
     * The extracted value is converted to the type defined in the label
     * descriptor. If either the extraction or the type conversion fails,
     * the label will have a default value. The default value for a string
     * label is an empty string, for an integer label its 0, and for a boolean
     * label its `false`.
     * Note that there are upper bounds on the maximum number of labels and the
     * number of active time series that are allowed in a project.
     *
     * Generated from protobuf field <code>map<string, string> label_extractors = 7 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabelExtractors($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->label_extractors = $arr;

        return $this;
    }

    /**
     * Optional. The `bucket_options` are required when the logs-based metric is
     * using a DISTRIBUTION value type and it describes the bucket boundaries
     * used to create a histogram of the extracted values.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions bucket_options = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Api\Distribution\BucketOptions|null
     */
    public function getBucketOptions()
    {
        return $this->bucket_options;
    }

    public function hasBucketOptions()
    {
        return isset($this->bucket_options);
    }

    public function clearBucketOptions()
    {
        unset($this->bucket_options);
    }

    /**
     * Optional. The `bucket_options` are required when the logs-based metric is
     * using a DISTRIBUTION value type and it describes the bucket boundaries
     * used to create a histogram of the extracted values.
     *
     * Generated from protobuf field <code>.google.api.Distribution.BucketOptions bucket_options = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Api\Distribution\BucketOptions $var
     * @return $this
     */
    public function setBucketOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Api\Distribution\BucketOptions::class);
        $this->bucket_options = $var;

        return $this;
    }

    /**
     * Output only. The creation timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. The creation timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. The last update timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. The last update timestamp of the metric.
     * This field may not be present for older metrics.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Deprecated. The API version that created or updated this metric.
     * The v2 format is used by default and cannot be changed.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric.ApiVersion version = 4 [deprecated = true];</code>
     * @return int
     * @deprecated
     */
    public function getVersion()
    {
        @trigger_error('version is deprecated.', E_USER_DEPRECATED);
        return $this->version;
    }

    /**
     * Deprecated. The API version that created or updated this metric.
     * The v2 format is used by default and cannot be changed.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric.ApiVersion version = 4 [deprecated = true];</code>
     * @param int $var
     * @return $this
     * @deprecated
     */
    public function setVersion($var)
    {
        @trigger_error('version is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkEnum($var, \Google\Cloud\Logging\V2\LogMetric\ApiVersion::class);
        $this->version = $var;

        return $this;
    }

}

